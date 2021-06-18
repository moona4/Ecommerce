@extends('front.layouts.main')
@section('content')

    <section class="faq-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="card card-body">
                            <h3 className="login-heading mb-4">
                                Enter 6 digit OTP
                            </h3>
                            <p className="login-heading mb-4">
                                One Time Password (OTP) has been
                                sent to your mobile
                                <b>bhjgvhgvhj</b>, please enter
                                here to verify your mobile.
                            </p>
                            <div class="form-group">
                                <input id="otp" type="text" class="form-control" maxlength="6" />
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button id="resendBtn" type="button" class="btn btn-danger">Resend OTP</button>
                                    <button id="confirmBtn" type="button" class="btn btn-success" disabled>Confirm
                                        OTP</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('custom-scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {

            $('#otp').keypress(function(e) {
                if (e.which >= 48 && e.which <= 57) {} else
                    return false;
            });

            $('#otp').keyup(function() {
                let otp = $(this).val();
                if (otp.length == 6) {
                    $('#confirmBtn').prop('disabled', false).trigger('click');
                } else
                    $('#confirmBtn').prop('disabled', true);
            });

            $('#confirmBtn').click(function() {
                let otp = $('#otp').val();
                $.ajax({
                    type: 'POST',
                    url: `{{ url('verify') }}`,
                    data: {
                        '_token': "{{ csrf_token() }}",
                        otp
                    },
                    datatype: 'json'
                }).then(response => {
                    window.open('/aayokhana', '_SELF');
                });
            });
        });

    </script>
@endpush
