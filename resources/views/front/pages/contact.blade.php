@extends('front.layouts.main')
@section('content')

    <section class="section-padding bg-dark inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mt-0 mb-3 text-white">Contact Us</h1>
                    <div class="breadcrumbs">
                        <p class="mb-0 text-white"><a class="text-white" href="#">Home</a> / <span
                                class="text-success">Contact Us</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h3 class="mt-1 mb-5">Get In Touch</h3>
                    <h6 class="text-dark"><i class="mdi mdi-home-map-marker"></i>Address:</h6>
                    <p>{{ $companyProfile->address }}</p>
                    <h6 class="text-dark"><i class="mdi mdi-phone"></i> Phone :</h6>
                    <p>+977 {{ $companyProfile->phone_no }}</p>
                    <h6 class="text-dark"><i class="mdi mdi-deskphone"></i> Mobile :</h6>
                    <p>+977 {{$companyProfile->mobile_no}}</p>
                    <h6 class="text-dark"><i class="mdi mdi-email"></i> Email :</h6>
                    <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                            data-cfemail="fb929a9694889a939a95bb9c969a9297d5989496">{{$companyProfile->email}}</a>
                    </p>
                    <h6 class="text-dark"><i class="mdi mdi-link"></i> Website :</h6>
                    <p>{{$companyProfile->website}}</p>
                    <div class="footer-social"><span>Follow : </span>
                        <a href="#"><i class="mdi mdi-facebook"></i></a>
                        <a href="#"><i class="mdi mdi-twitter"></i></a>
                        <a href="#"><i class="mdi mdi-instagram"></i></a>
                        <a href="#"><i class="mdi mdi-google"></i></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113060.50299444153!2d83.36249576257954!3d27.682045338460938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3996864275d9755f%3A0x2b1e92d89d4bb3ae!2sButwal!5e0!3m2!1sen!2snp!4v1611832020586!5m2!1sen!2snp"
                                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding  bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 section-title text-left mb-4">
                    <h2>Contact Us</h2>
                </div>
                {{-- <form action={{ route('faqs.store') }}  method="POST" class="col-lg-12 col-md-12" name="sentMessage" id="contactForm" novalidate> --}}
                <form action={{ route('contactus.store') }} method="POST">
                    @csrf
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Full Name" class="form-control" id="name" name="name" required
                                data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="control-group form-group col-md-6">
                            <div class="controls">
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="email" placeholder="Email Address" class="form-control" id="email" name="email"
                                    required data-validation-required-message="Please enter your email address.">
                            </div>
                        </div>
                        <div class="control-group form-group col-md-6">
                            <label>Mobile Number <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="tel" placeholder="Mobile Number" class="form-control" name="mobile_no"
                                    id="mobile_no" required
                                    data-validation-required-message="Please enter your phone number.">
                            </div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message <span class="text-danger">*</span></label>
                            <textarea rows="4" cols="100" placeholder="Message" class="form-control" id="message"
                                name="message" required data-validation-required-message="Please enter your message"
                                maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>

                    <button type="submit" class="btn btn-success">Send Message</button>
                </form>
            </div>
        </div>
    </section>

@endsection
