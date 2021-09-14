<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">



        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("home") }}" class="nav-link">
                    <i class="fa fa-dashboard nav-icon"></i>

               Dashboard
                </a>
            </li>




            <li class="nav-item nav-dropdown {{ request()->is('products*') || request()->is('customers*') || request()->is('vendors*')  ? 'open' : '' }}">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fa fa-tasks nav-icon">

                    </i>
                    Manages
                </a>
                <ul class="nav-dropdown-items">





                    <li class="nav-item">
                        <a href="{{ route("products.index") }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                            <i class="fa fa-product-hunt nav-icon">

                            </i>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("customers.index") }}" class="nav-link {{ request()->is('customers*') ? 'active' : '' }}">
                            <i class="fa fa-users nav-icon">

                            </i>
                            Customer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("vendors.index") }}" class="nav-link {{ request()->is('vendors*') ? 'active' : '' }}">
                            <i class="fa fa-users nav-icon">

                            </i>
                            Vendor
                        </a>
                    </li>



                </ul>
</li>
            <li class="nav-item nav-dropdown ">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fa fa-sellsy nav-icon">

                    </i>
                  Sells
                </a>
                <ul class="nav-dropdown-items">





                    <li class="nav-item">
                        <a href="{{ route("sells.index") }}" class="nav-link {{ request()->is('products/') ? 'active' : '' }}">
                            <i class="fa fa-sellsy nav-icon">

                            </i>
                            Sells
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("sells.create") }}" class="nav-link {{ request()->is('products/create') ? 'active' : '' }}">
                            <i class="fa fa-plus-circle nav-icon">

                            </i>
                            Sells Create
                        </a>
                    </li>




                </ul>
</li>
            <li class="nav-item nav-dropdown ">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fa fa-product-hunt nav-icon">

                    </i>
                Receive
                </a>
                <ul class="nav-dropdown-items">





                    <li class="nav-item">
                        <a href="{{ route("receive.index") }}" class="nav-link {{ request()->is('receive/') ? 'active' : '' }}">
                            <i class="fa fa-product-hunt nav-icon">

                            </i>
                            Receive
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("receive.create") }}" class="nav-link {{ request()->is('receive/create') ? 'active' : '' }}">
                            <i class="fa fa-plus-circle nav-icon">

                            </i>
                            Receive Create
                        </a>
                    </li>




                </ul>
</li>


            <li class="nav-item nav-dropdown ">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fa fa-file nav-icon">

                    </i>
                    Report
                </a>
                <ul class="nav-dropdown-items">





                    <li class="nav-item">
                        <a href="{{ route("receivereport.index") }}" class="nav-link {{ request()->is('receivereport*') ? 'active' : '' }}">
                            <i class="fa fa-briefcase nav-icon">

                            </i>
                            Receive Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("sellsreport.index") }}" class="nav-link {{ request()->is('sellsreport*') ? 'active' : '' }}">
                            <i class="fa fa-briefcase nav-icon">

                            </i>
                            Sells Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("stockreport.index") }}" class="nav-link {{ request()->is('stockreport*') ? 'active' : '' }}">
                            <i class="fa fa-briefcase nav-icon">

                            </i>
                            Stock Report
                        </a>
                    </li>




                </ul>
            </li>









            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-sign-out aria-hidden="true>

                    </i>
                   Log out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
