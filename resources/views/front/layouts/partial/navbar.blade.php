
<nav class="navbar navbar-light navbar-expand-lg bg-dark bg-faded osahan-menu">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">  </a>
        <a class="location-top" href="#"><i class="mdi mdi-map-marker-circle" aria-hidden="true"></i>Butwal</a>
        <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse"
            data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNavDropdown">
            <div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
                <div class="top-categories-search">
                    <form action="{{ url('searchFoods') }}" method="get">
                        <div class="input-group">
                            {{-- <span class="input-group-btn categories-dropdown">
                            <select class="form-control-select">
                                <option selected="selected">Your City</option>
                                <option>Butwal</option>
                                <option>Pokhara</option>
                                <option>Kathmandu</option>
                                <option value="4">Palpa</option>
                            </select>
                        </span> --}}
                            <input class="form-control" placeholder="Search products "
                                aria-label="Search products " type="text" name="filter">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit"><i class="mdi mdi-file-find"></i>
                                    Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="my-2 my-lg-0">
                <ul class="list-inline main-nav-right">
                    @if (!Auth::guard('customer')->check())
                        <li class="list-inline-item">
                                                        <a href="#" data-target="#bd-example-modal" data-toggle="modal" class="btn btn-link"><i
                                    class="mdi mdi-account-circle"></i> Login/Sign Up</a>
                        </li>
                    @else
                        <li class="list-inline-item dropdown osahan-top-dropdown">
                            <a class="btn btn-theme-round dropdown-toggle dropdown-toggle-top-user" href="#"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img alt="logo"
                                    src="https://ui-avatars.com/api/?name={{ Auth::guard('customer')->user()->display_name }}"><strong>Hi</strong>
                                {{ Auth::guard('customer')->user()->first_name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-list-design">
                                <a href="{{ route('profile') }}" class="dropdown-item"><i aria-hidden="true"
                                        class="mdi mdi-account-outline"></i> My Profile</a>
                                <a href="{{ route('deliveryAddress') }}" class="dropdown-item"><i aria-hidden="true"
                                        class="mdi mdi-map-marker-circle"></i> My Address</a>
                                <a href="{{ route('orderlist') }}" class="dropdown-item"><i aria-hidden="true"
                                        class="mdi mdi-format-list-bulleted"></i> Order List</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                        class="mdi mdi-lock"></i>{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('customers.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                    <li class="list-inline-item cart-btn">
                        <a href="#" data-toggle="offcanvas" class="btn btn-link border-none"><i
                                class="mdi mdi-cart"></i> My Cart
                            <small class="cart-value" id="countCartValue"></small></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                <li class="nav-item">
                    <a class="nav-link shop" href="{{ route('index') }}"><span class="mdi mdi-store"></span>
                     Food
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menu') }}" class="nav-link menu" id="menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">About Us</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        My Account
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="mdi mdi-chevron-right"
                                aria-hidden="true"></i>
                            My Profile</a>
                        <a class="dropdown-item" href="{{route('address')}}"><i class="mdi mdi-chevron-right"
                                aria-hidden="true"></i>
                            My Address</a>
                        <a class="dropdown-item" href="{{route('wishlist')}}"><i class="mdi mdi-chevron-right"
                                aria-hidden="true"></i>
                            Wish List </a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"
                                aria-hidden="true"></i>
                            Order List</a>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </li>
            </ul>
        </div>
    </div>

</nav>
