<?php
include_once('class/class.SessionCheck.php');
$session = new SessionCheck();
$session->loginSessionCheck($_SESSION);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Commonwealth Foods Inc.| Login 2</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body class="gray-bg" background="Company.jpg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="" id="login">
                        <div class="form-group">
                            <input name="email" id="login-form-email" type="email" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" id="login-form-password" name="password" class="form-control" placeholder="Password" required="">
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Commonwealth Foods Inc. &copy; 2015</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright 
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
    </div>

    <!-- Login JS -->
    <script src="JSfiles/login.js"></script>


    
</body>

</html>
