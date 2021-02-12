<?php require 'components/base/head.php'; ?>
<body class="hold-transition layout-fixed layout-navbar-fixed">
<div class="wrapper">
    <?php require 'components/nav/nav.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title flex-w flex-sb-m">
                                    <span class="mtext-103 cl2">
                                        Products
                                    </span>
                                </div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <section class="bg0 p-t-23 p-b-140">
                                    <div class="container">
                                        <?php if($DB::num_rows('r_items',"status=1") > 0){ ?>
                                                <div class="row isotope-grid">
                                        <?php
                                            $items = $DB::getQ('r_items', "status=1","*",null,"added_date","DESC","16");
                                            while($item=mysqli_fetch_assoc($items)){ ?>
                                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                                                <!-- Block2 -->
                                                <div class="block2">
                                                    <div class="block2-pic hov-img0">
                                                        <img src="uploads/products/<?php echo $item['item_image'] ?>" alt="IMG-PRODUCT" style="height: 35vh !important;" onclick="cart_action('add', '<?php echo $item['uid'] ?>')">
                                                    </div>

                                                    <div class="block2-txt flex-w flex-t p-t-14">
                                                        <div class="block2-txt-child1 flex-col-l ">
                                                            <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" onclick="cart_action('add', '<?php echo $item['uid'] ?>')">
                                                                <?php echo $item['item_name']; ?>
                                                            </a>
                                                            <span class="stext-105 cl3"><?php echo "Kes ".number_format($item['item_price'], 2); ?></span>
                                                        </div>
                                                        <div class="block2-txt-child2 flex-r p-t-3">
                                                            <button class="add_to_cart btn-addwish-b2 dis-block pos-relative" style="color: darkcyan" onclick="cart_action('add', '<?php echo $item['uid']; ?>')"><i class="zmdi zmdi-shopping-cart-add fs-20"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php   } ?>
                                                </div>
                                                <!-- Load more -->
                                                <div class="flex-c-m flex-w w-full p-t-45">
                                                    <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                                                        Load More
                                                    </a>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="flex-c-m flex-w w-full p-t-45">
                                                    <span class="flex-c-m stext-101 cl5 size-103 bg2 hov-btn1 p-lr-15 trans-04">
                                                        No Products Found.
                                                    </span>
                                                </div>
                                            <?php } ?>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title flex-w flex-sb-m">
                                    <span class="mtext-103 cl2">
                                        Your Cart
                                    </span>
                                </div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" onclick="cart_action('empty')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body" id="cart-items">
                                <div class="header-cart-content flex-w js-pscroll">
                                    <?php
                                        if(isset($_SESSION["cart_item"])){ ?>
                                    <ul class="header-cart-wrapitem w-full">
                                    <?php
                                            foreach($_SESSION["cart_item"] as $it){ ?>
                                                <li class="header-cart-item flex-w flex-t m-b-12">
                                                    <div class="header-cart-item-img">
                                                        <img src="uploads/products/<?php echo $it["item_image"] ?>" alt="IMG">
                                                    </div>

                                                    <div class="header-cart-item-txt p-t-8">
                                                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                                            <?php echo $it["item_name"] ?>
                                                        </a>

                                                        <span class="header-cart-item-info">
                                                            <?php echo $it["quantity"] ?> x <?php echo $it["item_price"]; ?>
                                                            <button onclick="cart_action('add', '<?php echo $it['item_id'] ?>')"><i class="zmdi zmdi-plus-box fs-25 m-l-40"></i></button>
                                                            <button onclick="cart_action('minus', '<?php echo $it['item_id'] ?>')"><i class="zmdi zmdi-minus-square fs-25 m-l-20"></i></button>
                                                            <button onclick="cart_action('remove', '<?php echo $it['item_id'] ?>')"><i class="zmdi zmdi-delete fs-25 m-l-20"></i></button>
                                                        </span>
                                                    </div>
                                                </li>

                                    <?php   } ?>
                                    </ul>
                                    <div class="w-full">
                                        <div class="header-cart-total w-full p-tb-15">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="cart_search_customer" placeholder="Search Customers..">
                                                <ul class="results" style="display: none"></ul>
                                            </div>
                                        </div>
                                        <?php if(isset($_SESSION["cart_customer"])){ ?>
                                            <div class="header-cart-total w-full p-tb-15" id="cart_customer">
                                                <?php foreach($_SESSION["cart_customer"] as $customer){ ?>
                                                    <ul class="list-group list-group-horizontal-sm">
                                                        <li class="list-group-item"><?php echo $customer["customer_name"] ?></li>
                                                        <li class="list-group-item"><button onclick="cart_action('remove_customer','<?php echo $customer["customer_id"] ?>')"><i class="zmdi zmdi-close"></i></button></li>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <div class="header-cart-total w-full p-tb-40">
                                            Total: <?php echo "Kes. ".number_format($cart->cart_total, 2); ?>
                                        </div>

                                        <div class="header-cart-buttons flex-w w-full">
                                            <button class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10 js-show-modal1">
                                                Check Out
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                        else{ ?>
                                        <ul class="header-cart-wrapitem w-full">
                                            <li class="header-cart-item flex-w flex-t m-b-12">
                                                <div class="header-cart-item-txt p-t-8">
                                                    <a class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                                        <?php echo $order->counter; ?>
                                                        No Items In Cart !
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-20 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="assets/images/icons/icon-close.png" alt="CLOSE">
                </button>
                <div class="bg0 p-t-10">
                    <div class="container set_details">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'components/base/footer.php' ?>
</div>
<!-- ./wrapper -->
<?php require 'components/base/js.php'; ?>
</body>
</html>
