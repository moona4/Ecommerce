<div class="modal fade login-modal-main" id="bd-example-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-modal">
                    <div class="row">
                        <div class="col-lg-6 pad-right-0">
                            <div class="login-modal-left">
                            </div>
                        </div>
                        <div class="col-lg-6 pad-left-0">
                            <button type="button" class="close close-top-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                <span class="sr-only">Close</span>
                            </button>
                            <div class="login-modal-right">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="login" role="tabpanel">
                                        <h5 class="heading-design-h5">Login to your account</h5>
                                        <form action="{{ route('customers.login') }}" method="post">
                                            @csrf
                                            <fieldset class="form-group">
                                                <label>Enter Email/Mobile number</label>
                                                <input type="text" class="form-control" id="username" name="mobile_no"
                                                    placeholder="+977 980 000 0000">
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label>Enter Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="********">
                                            </fieldset>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Remember me
                                                </label>
                                                <a href="{{ route('forgotPassword') }}" class="pull-right" >Forgot Password?</a>
                                            </div>
                                       
                                            
                                            <fieldset class="form-group">
                                                <button id="customerLogin" type="submit"
                                                    class="btn btn-lg btn-secondary btn-block">Enter
                                                    to your
                                                    account</button>
                                            </fieldset>

                                        </form>
                                        <div class="login-with-sites text-center">
                                            <p>or Login with your social profile:</p>
                                            <button class="btn-facebook login-icons btn-lg"><i
                                                    class="mdi mdi-facebook"></i>
                                                Facebook</button>
                                            <button class="btn-google login-icons btn-lg"><i class="mdi mdi-google"></i>
                                                Google</button>
                                            <button class="btn-twitter login-icons btn-lg"><i
                                                    class="mdi mdi-twitter"></i>
                                                Twitter</button>
                                        </div>

                                       
                                    </div>

                                    <div class="tab-pane" id="register" role="tabpanel">
                                        <h5 class="heading-design-h5">Register Now!</h5>
                                        <form action="{{ route('customers.register') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder="Enter First Name" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="Enter Last Name" required>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <fieldset class="form-group">
                                                <label>Mobile number</label>
                                                <input type="number" name="mobile_no" class="form-control"
                                                    placeholder="+977 0000000000" required>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label>Enter Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="********" required>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label>Enter Confirm Password </label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="********" required>
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label>Promo Code </label>
                                                <input type="text" class="form-control" name="promo_code"
                                                    placeholder=" Enter Promo Code" id="promo_code">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <button type="submit" class="btn btn-lg btn-secondary btn-block">Create
                                                    Your
                                                    Account</button>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text-center login-footer-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#login" role="tab"><i
                                                    class="mdi mdi-lock"></i> LOGIN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#register" role="tab"><i
                                                    class="mdi mdi-pencil"></i> REGISTER</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
