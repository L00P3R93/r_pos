<?php require 'components/base/head.php'; ?>
<body class="hold-transition layout-fixed layout-navbar-fixed">
<div class="wrapper">
    <?php require 'components/nav/nav.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">POS</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo $UT::get_gravatar($user_email,256, 'wavatar', 'x') ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"></h3>

                                <p class="text-muted text-center"><?php echo $UT::userGroups($user_group) ?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Username</b> <a class="float-right"><?php echo $user['user_name']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right"><?php echo $user['primary_phone']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right"><?php echo $user['primary_email']; ?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Sales</a></li>
                                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                                                  <a href="#">Jonathan Burke Jr.</a>
                                                  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                  </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="active tab-pane" id="settings">
                                        <div class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="first_name" class="col-sm-4 col-form-label">First Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $user['first_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"  value="<?php echo $user['last_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['primary_email'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $user['primary_phone'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_name" class="col-sm-4 col-form-label">User Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="<?php echo $user['user_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_group" class="col-sm-4 col-form-label">User Group</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="user_group">
                                                        <option>-- Select Group --</option>
                                                        <?php
                                                            $groups = $DB::getQ('r_user_groups',"group_status=1");
                                                            while($g = mysqli_fetch_assoc($groups)){ ?>
                                                                <option <?php echo $UT::selected($g["uid"], $user_group, "selected") ?> value="<?php echo $g["uid"] ?>"><?php echo $g["group_name"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="section" class="col-sm-4 col-form-label">Branch</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="section">
                                                        <option>-- Select Branch --</option>
                                                        <?php
                                                        $sections = $DB::getQ('r_user_sections',"status=1");
                                                        while($g = mysqli_fetch_assoc($sections)){ ?>
                                                            <option <?php echo $UT::selected($g["uid"], $user['section'], "selected") ?> value="<?php echo $g["uid"] ?>"><?php echo $g["section_name"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="processing"></div>
                                            <div class="feedback_area"></div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger save_customer">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
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

