@extends('front.layouts.main')
@section('content')

    <section class="faq-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card card-body">
                                <div class="accordion" id="accordionExample">
                                    @foreach ($faqs as $key => $faq)
                                        <div class="card mb-0">
                                            <div class="card-header" id="heading{{ $key }}">
                                                <h6 class="mb-0">
                                                    <a href="#" data-toggle="collapse"
                                                        data-target="#collapse{{ $key }}" aria-expanded="true"
                                                        aria-controls="collapse{{ $key }}">
                                                        <i class="icofont icofont-question-square"></i> {{ $faq->question }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <div id="collapse{{ $key }}"
                                                class="collapse {{ !$key ? 'show' : '' }}"
                                                aria-labelledby="heading{{ $key }}"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="card mb-2 mt-2">
                                        <div class="card-header" id="headingTwo">
                                            <h6 class="mb-0">
                                                <a href="#" data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="true" aria-controls="collapseTwo">
                                                    <i class="icofont icofont-question-square"></i> How do I get access to
                                                    case studies?
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                                richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                                dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                                tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                                assumenda shoreditch et. Nihil helvetica, craf.
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h6 class="mb-0">
                                                <a href="#" data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="true" aria-controls="collapseThree">
                                                    <i class="icofont icofont-question-square"></i> How much should I
                                                    capitalize?
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                                richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                                dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                                tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                                assumenda shoreditch et. Nihil helvetica, craf.
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card card-body">
                                <div class="section-header">
                                    <h5 class="heading-design-h5">
                                        Ask us question
                                    </h5>
                                </div>
                                <form action={{ route('faqs.store') }} method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Your Name <span
                                                        class="required">*</span></label>
                                                <input class="form-control border-form-control" value="" name="name"
                                                    placeholder="Enter Name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Email Address <span
                                                        class="required">*</span></label>
                                                <input class="form-control border-form-control " value="" name="email"
                                                    placeholder="ex@gmail.com" type="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Mobile Number <span class="required">*</span></label>
                                                <input class="form-control border-form-control" value="" name="mobile_no"
                                                    placeholder="Enter Mobile number" type="number">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Your Question <span class="required">*</span></label>
                                                <input class="form-control border-form-control" value="" name="question"
                                                    placeholder="Enter Question" type="text">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Your Question<span
                                                        class="required">*</span></label>
                                                <textarea class="form-control border-form-control"
                                                    name="question"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-danger btn-lg"> Cancel </button>
                                            <button type="submit" class="btn btn-success btn-lg"> Send Message </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
