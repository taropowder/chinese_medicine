<?php include '../sqlhelper.php';
if (isset($_POST['username'])) {
    $username = addslashes($_POST['username']);
    $flag = 0;
    $mysqli = new sqlhelper();
    $sql = "SELECT id,username,password FROM admin WHERE  username = '$username'";
    $res= $mysqli->execute_dql($sql);
    if ($res) {
        $row = $res->fetch_array(MYSQLI_NUM);
        $id = $row[0];
        $name = $row[1];
        $password = $row[2];
        if ($password == md5($_POST['password'])) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['userid'] = $id;
            header("Location: ../index.php");
        } else {
            echo "<script>alert('密码错误')</script>";
        }
    }else{
        echo "<script>alert('用户不存在')</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>图书馆借书系统登录</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/app.css" type="text/css" />
</head>
<body background="images/bodybg.jpg">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp ">
    <div class="container aside-xl" style="margin-top: 48px;">
        <a class="navbar-brand block"><span class="h1 font-bold" style="color: #ffffff">登录</span></a>
        <section class="m-b-lg">
            <header class="wrapper text-center">
                <strong class="text-sucess">国医奇谈管理登录</strong>
            </header>
            <form action="" method="post" >
                <div class="form-group">
                    <input type="username" name="username" placeholder="用户名" class="form-control  input-lg text-center no-border">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="密码" class="form-control  input-lg text-center no-border">
                </div>

                <button type="submit" class="btn btn-lg btn-danger lt b-white b-2x btn-block" id="validate-submit">
                    <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">登录</span></button>
            </form>
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder">

    </div>
</footer>
<!-- / footer -->
<div style="text-align:center;">
<p>233333</p>
</div>
</body>
</html>
