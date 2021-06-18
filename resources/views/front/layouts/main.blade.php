<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>Food </title>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('front.layouts.partial.styles')
</head>

<body>
    @include('front.layouts.partial.authmodal')
    @include('front.layouts.partial.navbar')

    @yield('content')

    @include('front.layouts.partial.footer')

    <nav id="main-nav">
        <ul class="first-nav">
            <li class="search" data-nav-custom-content>
                <div class="form-container">
                    <form class="search-form" action="https://www.google.com/search" target="_blank" method="get">
                        <input type="text" name="q" placeholder="Search..." autocomplete="off">
                    </form>
                </div>
            </li>
            <li class="cryptocurrency">
                <a href="#" target="_blank">All Fruits</a>
                <ul>
                    <li><a href="#">Fresh & Herbs</a></li>
                    <li><a href="#">Seasonal Fruits</a></li>
                    <li class="add">
                        <a href="#" data-nav-close="false" data-add="['Litecoin','Dogecoin','Bitcoin Cash','ZCash']">Add
                            Coin</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="second-nav">
            <li class="devices">
                <span>Imported Fruits</span>
                <ul>
                    <li class="mobile">
                        <a href="#">Citrus</a>
                        <ul>
                            <li><a href="#">Super Smart Phone</a></li>
                            <li><a href="#">Thin Magic Mobile</a></li>
                            <li><a href="#">Performance Crusher</a></li>
                            <li><a href="#">Futuristic Experience</a></li>
                        </ul>
                    </li>
                    <li class="television">
                        <a href="#">Cut Fresh & Herbs</a>
                        <div class="subnav-container">
                            <ul>
                                <li><a href="#">Flat Superscreen</a></li>
                                <li><a href="#">Gigantic LED</a></li>
                                <li><a href="#">Power Eater</a></li>
                                <li><a href="#">3D Experience</a></li>
                                <li><a href="#">Classic Comfort</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="camera">
                        <a href="#">Seasonal Fruits</a>
                        <ul>
                            <li><a href="#">Smart Shot</a></li>
                            <li><a href="#">Power Shooter</a></li>
                            <li><a href="#">Easy Photo Maker</a></li>
                            <li><a href="#">Super Pixel</a></li>
                        </ul>
                    </li>
                    <li data-nav-custom-content>
                        <div class="custom-message">
                            You can add any custom content to your navigation items. This text is just an example.
                        </div>
                    </li>
                </ul>
            </li>
            <li class="magazines">
                <a href="#magazines">Fresh & Herbs</a>
                <ul>
                    <li><a href="#">National Geographic</a></li>
                    <li><a href="#">Scientific American</a></li>
                    <li><a href="#">The Spectator</a></li>
                    <li><a href="#">The Rambler</a></li>
                    <li><a href="#">Physics World</a></li>
                    <li><a href="#">Popular Science</a></li>
                    <li><a href="#">Popular Mechanics</a></li>
                    <li><a href="#">Sky & Telescope</a></li>
                    <li><a href="#">Discover</a></li>
                    <li><a href="#">New Scientist</a></li>
                    <li><a href="#">Psychology Today</a></li>
                    <li><a href="#">Wired</a></li>
                </ul>
            </li>
            <li class="store">
                <a href="#">Store</a>
                <ul>
                    <li>
                        <a href="#">Fresh & Herbs</a>
                        <ul>
                            <li>
                                <a href="#">Women's Clothing</a>
                                <ul>
                                    <li><a href="#">Tops</a></li>
                                    <li><a href="#">Dresses</a></li>
                                    <li><a href="#">Trousers</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Sale</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Men's Clothing</a>
                                <ul>
                                    <li><a href="#">Shirts</a></li>
                                    <li><a href="#">Trousers</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Sale</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Jewelry</a></li>
                    <li><a href="#">Music</a></li>
                    <li><a href="#">Grocery</a></li>
                </ul>
            </li>
            <li class="collections"><a href="#collections">Collections</a></li>
            <li class="nolink">No Link</li>
            <li class="disabled"><a href="#" disabled>Disabled Link</a></li>
            <li class="add">
                <a href="#" data-nav-close="false" data-add="['Charts', 'Logs', 'Tests', 'Profile']">Add Item</a>
            </li>
        </ul>
        <ul class="bottom-nav">
            <li class="github">
                <a href="#" target="_blank">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                    </svg>
                </a>
            </li>
            <li class="email">
                <a href="#" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        <path d="M0 0h24v24H0z" fill="none" />
                    </svg>
                </a>
            </li>
            <li class="ko-fi">
                <a href="#" target="_blank">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.881 8.948c-.773-4.085-4.859-4.593-4.859-4.593H.723c-.604 0-.679.798-.679.798s-.082 7.324-.022 11.822c.164 2.424 2.586 2.672 2.586 2.672s8.267-.023 11.966-.049c2.438-.426 2.683-2.566 2.658-3.734 4.352.24 7.422-2.831 6.649-6.916zm-11.062 3.511c-1.246 1.453-4.011 3.976-4.011 3.976s-.121.119-.31.023c-.076-.057-.108-.09-.108-.09-.443-.441-3.368-3.049-4.034-3.954-.709-.965-1.041-2.7-.091-3.71.951-1.01 3.005-1.086 4.363.407 0 0 1.565-1.782 3.468-.963 1.904.82 1.832 3.011.723 4.311zm6.173.478c-.928.116-1.682.028-1.682.028V7.284h1.77s1.971.551 1.971 2.638c0 1.913-.985 2.667-2.059 3.015z" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
    <div class="cart-sidebar">
        <div class="cart-sidebar-header">
            <h5>
                My Cart <span class="text-success" id="countCartItems"></span> <a data-toggle="offcanvas"
                    class="float-right" href="#"><i class="mdi mdi-close"></i>
                </a>
            </h5>
        </div>
        <div class="cart-sidebar-body fetchCartItems">
            <div style="padding:20px 80px; color:maroon; font-size:1.5em">
                Empty Cart
            </div>

        </div>
        <div class="cart-sidebar-footer">
            <div class="cart-store-details">
                <p>Gross Amount <strong class="float-right grossAmount"></strong></p>
                <input type="hidden" class="grossAmt" value="">
                <p>Discount <strong class="float-right text-danger discount"></strong></p>
                <input type="hidden" class="discont">
                <h6>Net Amount <strong class="float-right text-danger netAmount"></strong></h6>
                <input type="hidden" class="netAmt">
            </div>
            @if (Auth::guard('customer')->check())
                <a href="{{ route('checkout') }}"><button class="btn btn-secondary btn-lg btn-block text-left"
                        type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout
                        </span><span class="float-right"><strong id="checkoutNetAmount"></strong> <span
                                class="mdi mdi-chevron-right"></span></span></button></a>

            @else
                <a href="#" data-target="#bd-example-modal" data-toggle="modal"><button
                        class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i
                                class="mdi mdi-cart-outline"></i> Proceed to Checkout
                        </span><span class="float-right"><strong id="checkoutNetAmount"></strong> <span
                                class="mdi mdi-chevron-right"></span></span></button></a>

            @endif

        </div>
    </div>

    @include('front.layouts.partial.scripts')

    @stack('custom-scripts')
</body>

</html>
<script>
    
    </script>
