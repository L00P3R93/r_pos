<?php require 'controllers/authenticate.php'; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/dist/img/shope/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/dist/img/shope/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/shope/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Login | POS</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/animate/animate.css" rel="stylesheet" />
    <link href="assets/plugins/css-hamburgers/hamburgers.min.css" rel="stylesheet" />
    <link href="assets/css/login-util.css" rel="stylesheet" />
    <link href="assets/css/login.css" rel="stylesheet" />
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="assets/images/login/img-01.png" alt="IMG">
            </div>
            <div class="login100-form">
                <div class="text-center p-b-40">
                    <h1 class="h3 mb-3 font-weight-normal">ShopE</h1>
                    <span class="login100-form-title">
						Member Login
					</span>
                </div>

                <div class="form-label-group">
                    <input type="text" id="username" class="form-control" placeholder="User Name" required autofocus>
                    <label for="username">User Name</label>
                </div>

                <div class="form-label-group">
                    <input type="password" id="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <div class="mb-3">
                    <div class="processing"></div>
                    <div class="feedback_area"></div>
                </div>
                <button class="btn btn-lg btn-primary btn-block login">Sign in</button>
                <p class="mt-5 mb-3 text-muted text-center"><strong>Copyright &copy; 2021 <a href="#">ShopE</a>.</strong> &nbsp;&nbsp;All rights reserved.</p>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/jquery/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/plugins/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="assets/js/login.js"></script>
<script src="controllers/js/functions.js"></script>
</body>
</html>