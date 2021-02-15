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
                        <h1 class="m-0 text-dark">Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">POS</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                Products
                            </span>
                            <button type="button" class="btn btn-sm btn-default bg-gradient-primary m-l-5" data-toggle="modal" data-target="#create-product-modal">
                                <i class="zmdi zmdi-plus-box"></i> New Product
                            </button>
                            <button type="button" class="btn btn-sm btn-default bg-gradient-secondary m-l-5" data-toggle="modal" data-target="#import-product-modal">
                                <i class="zmdi zmdi-upload"></i> Import
                            </button>
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
                        <div class="table-responsive-md">
                            <table id="products" class="table table-striped table-hover table-bordered">
                                <thead class="bg-gradient-navy">
                                    <tr>
                                        <th>SKU</th>
                                        <th>Product_Name</th>
                                        <th>Category_Name</th>
                                        <th>Product_Price</th>
                                        <th>Added_By</th>
                                        <th>Added_Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Product_Name</th>
                                        <th>Category_Name</th>
                                        <th>Product_Price</th>
                                        <th>Added_By</th>
                                        <th>Added_Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div class="modal fade" id="create-product-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-navy">
                    <h4 class="modal-title">Create Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="zmdi zmdi-close-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return save_product(this);">
                    <div class="form-horizontal product-form">
                        <div class="form-group row">
                            <label for="item_name" class="col-sm-4 col-form-label">Item Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_price" class="col-sm-4 col-form-label">Item Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="item_price" name="item_price" placeholder="Item Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_description" class="col-sm-4 col-form-label">Item Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="Item Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_category" class="col-sm-4 col-form-label">Item Category</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="item_category" name="item_category">
                                    <option>-- Select Category --</option>
                                    <?php
                                    $category = $DB::getQ('r_categories',"status=1");
                                    while($c = mysqli_fetch_assoc($category)){
                                        $name = $UT::uni_name($c["category_name"]);
                                        echo "<option  value='$c[uid]'>$name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="status" name="status">
                                    <option>-- Select Status --</option>
                                    <option value="1">In-Stock</option>
                                    <option value="2">Out-Of-Stock</option>
                                    <option value="3">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_name" class="col-sm-4 col-form-label">Item Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control bg-gradient-navy" id="item_image" name="item_image"/>
                                <div id="preview" class="preview_image card m-t-3" style="display: none">
                                    <img class="item_preview" src="#" alt=""/>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <?php
                        $categories = $DB::getQ('r_user_sections',"status=1");
                        while($c = mysqli_fetch_assoc($categories)){ ?>
                            <div class="form-group row">
                                <label for="status" class="col-sm-4 col-form-label"><?php echo $c["section_name"] ?> Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="<?php echo $c["section_name"] ?>" name="<?php echo $c["section_name"] ?>" placeholder="<?php echo $c["section_name"] ?> Quantity" required>
                                </div>
                            </div>
                        <?php    } ?>
                        <hr />
                        <div class="processing"></div>
                        <div class="feedback_area">
                            <?php

                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="import-product-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-navy">
                    <h4 class="modal-title">Import Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="zmdi zmdi-close-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group row">
                            <label for="user_name" class="col-sm-4 col-form-label">Upload Excel File</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control bg-gradient-navy" id="excel_file"/>
                            </div>
                        </div>
                        <div class="processing_"></div>
                        <div class="feedback_area_"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary import_products">Import</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="edit-product-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-navy">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="zmdi zmdi-close-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="edit_product_form">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php require 'components/base/footer.php' ?>
</div>
<!-- ./wrapper -->
<?php require 'components/base/js.php'; ?>
</body>
</html>
