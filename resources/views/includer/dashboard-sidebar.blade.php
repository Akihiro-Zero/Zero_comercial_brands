<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="{{ url('/') }}" class="simple-text logo-normal">
        Comercial Brands
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard-page') ? 'active' : '' }} ">
          <a class="nav-link" href="{{ url('dashboard-page') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item
        {{ Request::is('user-profile') ? 'active' : '' }}
        {{ Request::is('seller-registration') ? 'active' : '' }}
        {{ Request::is('seller-update') ? 'active' : '' }}
        ">
          <a class="nav-link" href="{{ url('user-profile') }}">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>
        <li class="nav-item
        {{ Request::is('user-wallet') ? 'active' : '' }}
        ">
          <a class="nav-link" href="{{ url('user-wallet') }}">
            <i class="material-icons">person</i>
            <p>My e-Wallet Money</p>
          </a>
        </li>
        <li class="nav-item
                {{ Request::is('my-order-list') ? 'active' : '' }}
                ">
            <a class="nav-link " href="{{ url('my-order-list') }}">
                <i class="material-icons">content_paste</i>
                <p>My Order List</p>
            </a>
            </li>
        @if (Auth()->user()->hasRole('admin'))
            <li class="nav-item
                {{ Request::is('category-list') ? 'active' : '' }}
                {{ Request::is('category-add') ? 'active' : '' }}
                ">
            <a class="nav-link " href="{{ url('category-list') }}">
                <i class="material-icons">content_paste</i>
                <p>Category List</p>
            </a>
            </li>
        @endif
        @if (Auth()->user()->hasRole(['seller','admin']))
            <li class="nav-item
            {{ Request::is('product-list') ? 'active' : '' }}
            {{ Request::is('product-add') ? 'active' : '' }}
            ">
            <a class="nav-link" href="{{ url('product-list') }}">
                <i class="material-icons">library_books</i>
                <p>Product List</p>
            </a>
            </li>
        @endif
        @if (auth()->user()->hasRole('admin'))
            <li class="nav-item
            {{ Request::is('user-list') ? 'active' : '' }}
            ">
            <a class="nav-link" href="{{ url('user-list') }}">
                <i class="material-icons">bubble_chart</i>
                <p>User Lists</p>
            </a>
            </li>
        @endif
        @if (auth()->user()->hasRole(['admin','seller']))
            <li class="nav-item
            {{ Request::is('order-list') ? 'active' : '' }}
            ">
            <a class="nav-link" href="{{ url('order-list') }}">
                <i class="material-icons">notifications</i>
                <p>My Selling Product</p>
            </a>
            </li>
        @endif
      </ul>
    </div>
  </div>
