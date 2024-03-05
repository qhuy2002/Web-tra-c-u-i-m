<?php
    session_start();
    error_reporting(0);
    include('connect.php');
    if($_SESSION['alogin']!=''){
        $_SESSION['alogin']='';
    }
    if(isset($_POST['login']))
    {
        $uname=$_POST['username'];
        $password=md5($_POST['password']);
        $sql ="SELECT email,mat_khau FROM tbl_dangnhap WHERE email=:uname and mat_khau=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
            $_SESSION['alogin']=$_POST['username'];
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        } else{
            echo "<script>alert('Đăng nhập thất bại!');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trang Chủ</title>

        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >

        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >

        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >

        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->

        <link rel="stylesheet" href="css/main.css" media="screen" >

        <script src="js/modernizr/modernizr.min.js"></script>

    </head>

    <body class="">

        <div class="main-wrapper">

            <div class="">

                <div class="row">

                    <h1 align="center">HỆ THỐNG QUẢN LÍ HỌC TẬP SINH VIÊN</h1>

                    <div class="col-lg-6 visible-lg-block">

                        <section class="section">

                            <div class="row mt-40">

                                <div class="col-md-10 col-md-offset-1 pt-50">

                                    <div class="row mt-30 ">

                                        <div class="col-md-11">

                                            <div class="panel" style="height: 400px">

                                                <div class="panel-heading">

                                                    <div class="panel-title text-center">

                                                        <h4>Tra Cứu Điểm Học Phần</h4>

                                                    </div>

                                                </div>

                                                <div class="panel-body p-20">

                                                    <div class="section-title">

                                                        <p class="sub-title">

                                                            Tra cứu điểm học phần là dịch vụ cung cấp tới sinh viên. Dịch vụ này

                                                            cho phép sinh viên tra cứu điểm học phần theo mã sinh viên và mã học

                                                            phần. Sinh viên nhấn vào nút bấm tra cứu bên dưới để đến trang tra cứu.

                                                        </p>

                                                    </div>

                                                    <hr>

                                                    <form class="form-horizontal" method="post">

                                                        <div class="form-group">                                                                                                                        

                                                            <div class="col-sm-offset-2 col-sm-10">

                                                                <a  type="button"

                                                                    href="tra_cuu.php"

                                                                    class="btn btn-info btn-labeled pull-right">
                                                                    Tra Cứu
                                                                    <span class="btn-label btn-label-right">
                                                                        <i class="fa fa-search"></i>
                                                                    </span>
                                                                </a>
                                                            </div>                               
                                                        </div>
                                                    </form>                                                
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="section">
                            <div class="row mt-40">
                                <div class="col-md-10 col-md-offset-1 pt-50">
                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel" style="height: 400px">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>Quản Lý Hệ Thống</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">
                                                    <div class="section-title">
                                                        <p class="sub-title">
                                                        </p>
                                                    </div>
                                                    <hr>
                                                    <form class="form-horizontal" method="post">
                                                        <div class="form-group">
                                                            <label for="inputEmail3" class="col-sm-3 control-label">Tài Khoản</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPassword3" class="col-sm-3 control-label">Mật Khẩu</label>
                                                            <div class="col-sm-9">
                                                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-20">
                                                            <div class="col-sm-offset-2 col-sm-10">                                                          
                                                                <button type="submit" name="login" class="btn btn-info btn-labeled pull-right">Đăng Nhập<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <p class="text-muted text-center">
                                                <small>
                                                    Nguyễn Quang Huy
                                                </small>
                                            </p>
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->
        </div>
        <!-- /.main-wrapper -->
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <!-- ========== PAGE JS FILES ========== -->
        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){
            });
        </script>
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>