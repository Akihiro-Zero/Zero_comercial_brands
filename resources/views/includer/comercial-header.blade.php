<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">

            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item" >
                                <a title="Hotline: (+62) 8810 2509 6932" href="https://wa.me/0881025096932" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+62) 8810 2509 6932</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                        @guest
                            <li class="menu-item" ><a title="Register or Login" href="{{ url('login') }}">Login</a></li>
                            <li class="menu-item" ><a title="Register or Login" href="{{ url('register') }}">Register</a></li>
                        @endguest
                            @auth
                                @if (Auth::user()->role == "Admin")
                                <li class="menu-item menu-item-has-children parent" >
                                    <a title="My Account" href="#">My Account "{{ Auth::user()->name }}" (Admin)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency" >
                                        <li class="menu-item"><a href="{{ url('dashboard-page') }}">Dashboard</a></li>
                                        <li class="menu-item" >
                                            <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{__('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @elseif (Auth::user()->role == "Seller")
                                <a title="My Account" href="#">My Account (Seller)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency" >
                                        <li class="menu-item"><a href="#">Products</a></li>
                                        <li class="menu-item"><a href="{{ url('categories') }}">Categories</a></li>
                                        <li class="menu-item"><a href="#">Coupons</a></li>
                                        <li class="menu-item"><a href="#">Orders</a></li>
                                        <li class="menu-item"><a href="#">Customers</a></li>
                                        <li class="menu-item" >
                                            <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{__('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                @else
                                <li class="menu-item menu-item-has-children parent" >
                                    <a title="My Account" href="#">My Account {{ Auth::user()->name }} (User)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency" >
                                        <li class="menu-item"><a href="{{ url('order-list') }}">Orders</a></li>
                                        <li class="menu-item"><a href="{{ url('user-profile') }}">Address</a></li>
                                        <li class="menu-item"><a href="{{ route('dashboard') }}">Account Details</a></li>
                                        <li class="menu-item" >
                                            <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{__('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="{{ url('/') }}" class="link-to-home"><img src="{{ asset('images/logo-top-1.png') }}" alt="mercado"></a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="{{ url('product-search') }}" id="form-search-top" name="form-search-top">
                                @csrf
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="{{ url('wishlist') }}" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    {{-- <span class="index">1 item</span> --}}
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{ url('cart') }}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    {{-- <span class="index">4 items</span> --}}
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                {{-- <div class="header-nav-section">
                    <div class="container">
                        <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                            <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                        </ul>
                    </div>
                </div> --}}

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                            <li class="menu-item home-icon">
                                <a href="{{ url('/') }}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('about-us') }}" class="link-term mercado-item-title nav-item active">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('shop') }}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('cart') }}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('contact-us') }}" class="link-term mercado-item-title">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
