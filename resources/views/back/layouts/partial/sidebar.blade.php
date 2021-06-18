<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> Customers<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{route('customers.index')}}"><i class="fa fa-user"></i> Customers list </a>
                    </li>
                    <li>
                        <a href="{{ route('reviews.index') }}"><i class="fa fa-tags"></i> Reviews </a>

                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="{{ route('stores.index') }}"><i class="fa fa-gift"> </i> Stores</a>

            </li>
            <li>
                <a href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-copyright-mark"></i> Category
                </a>  
            </li>

            <li>
                <a href="{{ route('products.index') }}"><i class="fa fa-product-hunt"></i> Products</a>

            </li>
            
            <li>
                <a href="{{ route('orders.index') }}"><i class="fa fa-shopping-cart"></i> Orders</a>

            </li>
            <li>
                <a href="{{ route('deliveryaddress.index') }}"><i class="fa fa-map-marker"></i> Delivery Address </a>

            </li>
            <li>
                <a href="{{ route('offers.index') }}"><i class="fa fa-folder-open"></i> Offers </a>

            </li>

            <li>
                <a href="{{ route('sliders.index') }}"><i class="fa fa-sliders"></i> Sliders</a>

            </li>

            

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{route('payments.index')}}"><i class="fa fa-credit-card"></i> Payment </a>
                    </li>
                    <li>
                        <a href="{{route('socialMedias.index')}}"><i class="fa fa-bookmark"></i> Social Media</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="{{ route('roles.index') }}"><i class="glyphicon glyphicon-triangle-right"></i> Roles </a>
            </li>
            <li>
                <a href="{{ route('companyprofile.index') }}"><i class="fa fa-tags"></i> Company Profile </a>

            </li>
            <li>
                <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Users </a>

            </li>
           
            <li>
                <a href="#"><i class="fa fa-book"></i> Backup Database </a>
            </li>

            

            <li>
                <a href="{{ route('faqs.index') }}"><i class="fa fa-question-circle"></i> FAQs </a>
            </li>

            </li>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
