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
                        <h1 class="m-0 text-dark">Customers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">POS</a></li>
                            <li class="breadcrumb-item active">Customers</li>
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
                    <div class="card-header border-transparent">
                        <h3 class="card-title">
                            Customers
                            <button type="button" class="btn btn-sm btn-default bg-gradient-navy" data-toggle="modal" data-target="#modal-add-customers">
                                <i class="zmdi zmdi-plus-box"></i> New
                            </button>
                            <button type="button" class="btn btn-sm btn-default bg-gradient-secondary" data-toggle="modal" data-target="#modal-import-customers">
                                <i class="zmdi zmdi-upload"></i> Import
                            </button>
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table id="customers" class="table table-bordered table-striped table-hover">
                                <thead class="bg-gradient-navy">
                                <tr>
                                    <th>First_Name</th>
                                    <th>Second_Name</th>
                                    <th>Last_Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Added_By</th>
                                    <th>Section</th>
                                    <th>Status</th>
                                    <th>Added_date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                <tr>
                                    <th>First_Name</th>
                                    <th>Second_Name</th>
                                    <th>Last_Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Added_By</th>
                                    <th>Section</th>
                                    <th>Status</th>
                                    <th>Added_date</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div class="modal fade" id="modal-add-customers">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-navy">
                    <h4 class="modal-title">Create Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="zmdi zmdi-close-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="second_name" class="col-sm-4 col-form-label">Second Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="second_name" name="second_name" placeholder="Second Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="section" class="col-sm-4 col-form-label">Branch</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="section">
                                    <option>-- Select Branch --</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="status">
                                    <option>-- Select Status --</option>
                                    <?php
                                    $state = $DB::getQ('r_staff_status',"status=1");
                                    while($s = mysqli_fetch_assoc($state)){
                                        $name = $UT::uni_name($s["status_name"]);
                                        echo "<option  value='$s[uid]'>$name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="processing"></div>
                        <div class="feedback_area"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_customer">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-import-customers">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-navy">
                    <h4 class="modal-title">Import Customer</h4>
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
                    <button type="button" class="btn btn-primary import_customers">Upload</button>
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
