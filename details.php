<?php
    require 'components/base/head.php';
    $product_id = isset($_GET["product"])? $UT::decurl($_GET["product"]) : 0;
    $p = $DB::get('r_items',"uid='$product_id'");
?>
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
                        <h1 class="m-0 text-dark">Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">POS</a></li>
                            <li class="breadcrumb-item active">
                                <?php
                                    if(isset($_GET["product"]))
                                        echo "Product Details";
                                    else
                                        echo "Details";
                                ?>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title flex-w flex-sb-m">
                            <span class="mtext-103 cl2">
                                <?php echo $p["item_name"] ?>&apos;s Details
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
                        <!-- Product Detail -->
                        <section class="sec-product-detail bg0 p-t-65 p-b-60">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-7 p-b-30">
                                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                                            <div class="wrap-slick3 flex-sb flex-w">
                                                <div class="wrap-slick3-dots"></div>
                                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                                <div class="slick3 gallery-lb">
                                                    <div class="item-slick3" data-thumb="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>">
                                                        <div class="wrap-pic-w pos-relative">
                                                            <img src="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>" alt="IMG-PRODUCT">

                                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>">
                                                                <i class="fa fa-expand"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="item-slick3" data-thumb="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>">
                                                        <div class="wrap-pic-w pos-relative">
                                                            <img src="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>" alt="IMG-PRODUCT">
                                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>">
                                                                <i class="fa fa-expand"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="item-slick3" data-thumb="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>">
                                                        <div class="wrap-pic-w pos-relative">
                                                            <img src="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>" alt="IMG-PRODUCT">

                                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="http://localhost/pos/uploads/products/<?php echo $p["item_image"]; ?>">
                                                                <i class="fa fa-expand"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-5 p-b-30">
                                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                                <?php echo $p["item_name"] ?>
                                            </h4>

                                            <span class="mtext-106 cl2">
                                                Kes. <?php echo number_format($p["item_price"], 2) ?>
                                            </span>

                                            <p class="stext-102 cl3 p-t-23">
                                                <?php echo $p["item_description"] ?>
                                            </p>

                                            <!--  -->
                                            <div class="p-t-33">
                                                <div class="flex-w flex-r-m p-b-10">
                                                    <div class="size-203 flex-c-m respon6">
                                                        Size
                                                    </div>

                                                    <div class="size-204 respon6-next">
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label class="btn btn-default text-center">
                                                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                                                <span class="text-xl">S</span>
                                                                <br>
                                                                Small
                                                            </label>
                                                            <label class="btn btn-default text-center">
                                                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                                                <span class="text-xl">M</span>
                                                                <br>
                                                                Medium
                                                            </label>
                                                            <label class="btn btn-default text-center">
                                                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                                                <span class="text-xl">L</span>
                                                                <br>
                                                                Large
                                                            </label>
                                                            <label class="btn btn-default text-center">
                                                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                                                <span class="text-xl">XL</span>
                                                                <br>
                                                                Xtra-Large
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex-w flex-r-m p-b-10">
                                                    <div class="size-203 flex-c-m respon6">
                                                        Color
                                                    </div>

                                                    <div class="size-204 respon6-next p-b-15">
                                                        <div class="rs1-select2 bor8 bg0">
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn btn-default text-center active">
                                                                    <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                                                                    Green
                                                                    <br>
                                                                    <i class="fas fa-circle fa-2x text-green"></i>
                                                                </label>
                                                                <label class="btn btn-default text-center">
                                                                    <input type="radio" name="color_option" id="color_option2" autocomplete="off">
                                                                    Blue
                                                                    <br>
                                                                    <i class="fas fa-circle fa-2x text-blue"></i>
                                                                </label>
                                                                <label class="btn btn-default text-center">
                                                                    <input type="radio" name="color_option" id="color_option3" autocomplete="off">
                                                                    Purple
                                                                    <br>
                                                                    <i class="fas fa-circle fa-2x text-purple"></i>
                                                                </label>
                                                                <label class="btn btn-default text-center">
                                                                    <input type="radio" name="color_option" id="color_option4" autocomplete="off">
                                                                    Red
                                                                    <br>
                                                                    <i class="fas fa-circle fa-2x text-red"></i>
                                                                </label>
                                                                <label class="btn btn-default text-center">
                                                                    <input type="radio" name="color_option" id="color_option5" autocomplete="off">
                                                                    Orange
                                                                    <br>
                                                                    <i class="fas fa-circle fa-2x text-orange"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex-w flex-r-m p-b-10">
                                                    <div class="size-204 flex-w flex-m respon6-next">
                                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                            Add to cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
                                <span class="stext-107 cl6 p-lr-25">SKU: <?php echo $p["item_sku"] ?></span>
                                <span class="stext-107 cl6 p-lr-25">Categories: <?php echo $DB::get_value('r_categories',"uid='$p[category_id]'","category_name"); ?></span>
                            </div>
                        </section>

                        <!-- Related Products -->
                        <section class="sec-relate-product bg0 p-t-45 p-b-105">
                            <div class="container">
                                <div class="p-b-45">
                                    <h3 class="ltext-106 cl5 txt-center">Related Products</h3>
                                </div>

                                <!-- Slide2 -->
                                <div class="wrap-slick2">
                                    <div class="slick2">
                                        <?php
                                            $related = $DB::getQ('r_items',"category_id='$p[category_id]'");
                                            while($r = mysqli_fetch_assoc($related)){ ?>
                                                <div class="item-slick2 p-l- p-r-7 p-t-15 p-b-15">
                                                    <!-- Block2 -->
                                                    <div class="block2">
                                                        <div class="block2-pic hov-img0">
                                                            <img src="http://localhost/pos/uploads/products/<?php echo $r['item_image'] ?>" alt="IMG-PRODUCT">
                                                            <a href="http://localhost/pos/<?php echo $UT::encurl($r["uid"]) ?>/" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">Quick View</a>
                                                        </div>

                                                        <div class="block2-txt flex-w flex-t p-t-14">
                                                            <div class="block2-txt-child1 flex-col-l ">
                                                                <a href="http://localhost/pos/<?php echo $UT::encurl($r["uid"]) ?>/" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"><?php echo $r["item_name"] ?></a>
                                                                <span class="stext-105 cl3">Kes. <?php echo number_format($r["item_price"], 2) ?></span>
                                                            </div>

                                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                    <img class="icon-heart1 dis-block trans-04" src="http://localhost/pos/assets/images/icons/icon-heart-01.png" alt="ICON">
                                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="http://localhost/pos/assets/images/icons/icon-heart-02.png" alt="ICON">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require 'components/base/footer.php' ?>
</div>
<!-- ./wrapper -->
<?php require 'components/base/js.php'; ?>
</body>
</html>
