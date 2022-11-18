<?php
session_start();
require_once("../include/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
    <meta name="author" content="Monoget Saha"/>
    <meta name="robots" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CouponXHosting"/>
    <meta property="og:title" content="CouponXHosting"/>
    <meta property="og:description" content="CouponXHosting"/>
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
    <title>Login | CouponXHosting</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="public/images/favicon.png" />
    <link href="public/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
                                        <h1>CouponXHosting</h1>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="https://dompet.dexignlab.com/xhtml/index.html">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="public/vendor/global/global.min.js"></script>
    <script src="public/js/custom.min.js"></script>
    <script src="public/js/dlabnav-init.js"></script>
	<script src="public/js/styleSwitcher.js"></script>
</body>
</html>