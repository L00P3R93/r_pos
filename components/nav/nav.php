<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!--<a class="navbar-brand" href="#">Navbar</a>-->
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link js-show-cart"><i class="zmdi zmdi-menu fs-25"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img class="avatar" src="<?php echo $UT::get_gravatar($user_email,256, 'wavatar', 'x') ?>" width="30" height="30" alt="IMG_AVATAR" />
                <span class="m-l-2"><?php echo $user_names; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="profile" class="dropdown-item">
                    <i class="zmdi zmdi-account"></i>&nbsp;&nbsp;Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout" class="dropdown-item">
                    <i class="zmdi zmdi-power"></i>&nbsp;&nbsp;Log Out
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<div class="wrap-header-menu js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-10 p-r-15">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Menu
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-b-8">
            <ul class="header-menu list-group list-group-flush js-scroll">
                <li class="list-group-item">
                    <a href="customers">
                        <i class="zmdi zmdi-accounts fs-20"></i>
                        Customers
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="shop">
                        <i class="zmdi zmdi-store-24 fs-20"></i>
                        Sales
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="products">
                        <i class="zmdi zmdi-store fs-20"></i>
                        Products
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="categories">
                        <i class="zmdi zmdi-view-toc fs-20"></i>
                        Categories
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="orders">
                        <i class="zmdi zmdi-case-check fs-20"></i>
                        Orders
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <i class="zmdi zmdi-file-text fs-20"></i>
                        Reports
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <i class="zmdi zmdi-comment-alt-text fs-20"></i>
                        Messages
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <i class="zmdi zmdi-money-off fs-20"></i>
                        Expenses
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="settings">
                        <i class="zmdi zmdi-settings fs-20"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
