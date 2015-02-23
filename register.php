<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>


            </div>
            <p>Create account to see it in action.</p>
            <form class="register m-t" role="form" >
                <div class="form-group">
                    <input type="text" name="First_Name" class="form-control" placeholder="First Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="Last_Name" class="form-control" placeholder="Last Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="User_Name" class="form-control" placeholder="User Name" required="">
                </div>

                <div class="form-group">
                    <input type="password" name="Password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="Confirm_Password" class="form-control" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="Email" class="form-control" placeholder="Email" required="">
                </div>

                 <div class="form-group">
                    <input type="text" name="Mobile_Number" class="form-control" placeholder="Mobile Number" required="">
                </div>

                <div class="form-group">
                    <input type="text" name="Address" class="form-control" placeholder="Address" required="">
                </div>

                <div class="form-group">
                    <select class="form-control m-b" name="Gender">
                        <option value="1">Male</option>  
                        <option value="2">Female</option>     
                    </select>
                </div>



                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="JSfiles/register.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>
</html>
