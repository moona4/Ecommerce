<script src="{{ asset('public/back/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('public/back/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('public/back/metisMenu/metisMenu.min.js') }}"></script>

<!-- DataTables JavaScript -->
<script src="{{ asset('public/back/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/back/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/back/datatables-responsive/dataTables.responsive.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('public/back/js/sb-admin-2.js') }}"></script>


<!-- Toast CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<!-- sweetalert CDN for sign in-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    var toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    function loginSuccessMsg() {
        toastMixin.fire({
            animation: true,
            title: 'Signed in successfully'
        });
    }

    function successMsg() {
        toastMixin.fire({
            animation: true,
            title: `{{ Session('successMsg') }}`
        });
    }

    $(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        @if(Session('loginSuccess'))
            loginSuccessMsg();
        @endif

        @if(Session('successMsg'))
            successMsg();
        @endif
    });
</script>
