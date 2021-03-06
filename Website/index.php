<?php
require 'OS_BR.php';
require 'Logger.php';
session_start();


// file -> Writes to a file with name $_SESSION['filename']
// remote -> Send post request to $_SESSION['endpoint']
$_SESSION['method'] = "file";

$_SESSION['endpoint'] = "http://honeypot.requestcatcher.com/test";
$_SESSION['filename'] = "data.log";

$obj = new OS_BR();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $current = "-----------------" . date('m/d/Y h:i:s', time()) . "------------------\n";
    $current .= "Username: {$_POST['username']}\n";
    $current .= "Password: {$_POST['password']}\n";
    $current .= "IP:{$_SERVER['REMOTE_ADDR']}\n";
    $current .= "Browser: " . $obj->showInfo('browser') . " " . $obj->showInfo('version') . "\n";
    $current .= "OS: " . $obj->showInfo('os') . "\n";
    $referrer = $_SERVER['HTTP_REFERER'] . "\n";
    if ($referrer == "") {
        $current .= "Referer: This page was accessed directly\n";
    } else {
        $current .= "Referer: " . $referrer;
    }

    Logger::log($current);
//    file_put_contents($file, $current, FILE_APPEND);



    if ($_POST['username'] == "admin" and $_POST['password'] == "admin") {
        header("Location: /controlpanel.php");
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>Panel
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <form action="/index.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
