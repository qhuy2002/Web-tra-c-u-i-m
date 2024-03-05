<?php
session_start();
error_reporting(0);
include('connect.php');

 

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $msv = $_POST['msv'];
        $mhp = $_POST['mhp'];
        $A = $_POST['A'];
        $B = $_POST['B'];
        $C = $_POST['C'];
        // Thêm sinh viên vào bảng tbl_sinhvien trong CSDL
        try {
            $sql = "INSERT INTO tbl_diemhocphan (msv, mhp, A, B, C) VALUES (?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$msv, $mhp, $A, $B, $C]);
            $msg = "Bạn đã thêm điểm mới thành công";
        } catch (PDOException $e) {
            $error = "Có lỗi xảy ra khi thêm điểm mới: " . $e->getMessage();
        }
    }
}
?>



<!DOCTYPE html>

<html lang="vi">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tạo điểm mới điểm học phần</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">

    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">

    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">

    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">

    <link rel="stylesheet" href="css/prism/prism.css" media="screen">

    <link rel="stylesheet" href="css/select2/select2.min.css">

    <link rel="stylesheet" href="css/main.css" media="screen">

    <script src="js/modernizr/modernizr.min.js"></script>

</head>

 

<body class="top-navbar-fixed">

    <div class="main-wrapper">

 

        <!-- ========== TOP NAVBAR ========== -->

        <?php include('includes/topbar.php'); ?>

        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->

        <div class="content-wrapper">

            <div class="content-container">

 

                <!-- ========== LEFT SIDEBAR ========== -->

                <?php include('includes/leftbar.php'); ?>

                <!-- /.left-sidebar -->

 

                <div class="main-page">

                    <div class="container-fluid">

                        <div class="row page-title-div">

                            <div class="col-md-6">

                                <h2 class="title">Tạo điểm mới</h2>

                            </div>

                        </div>

                        <div class="row breadcrumb-div">

                            <div class="col-md-6">

                                <ul class="breadcrumb">

                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Trang chủ</a></li>

                                    <li>Mã sinh viên</li>

                                    <li class="active">Mã học phần</li>

                                    <li>A</li>

                                    <li>B</li>

                                    <li>C</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="panel">

                                    <div class="panel-heading">

                                        <div class="panel-title">

                                            <h5>Tạo điểm mới</h5>

                                        </div>

                                    </div>

                                    <div class="panel-body">

                                        <?php if (isset($msg)) { ?>

                                            <div class="alert alert-success left-icon-alert" role="alert">

                                                <strong>Thành công!</strong> <?php echo htmlentities($msg); ?>

                                            </div>

                                        <?php } else if (isset($error)) { ?>

                                            <div class="alert alert-danger left-icon-alert" role="alert">

                                                <strong>Đã xảy ra lỗi!</strong> <?php echo htmlentities($error); ?>

                                            </div>

                                        <?php } ?>

                                        <form class="form-horizontal" method="post">

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Mã sinh viên:</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="msv" class="form-control" id="default" placeholder="Mã sinh viên" required="required">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Mã học phần:</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="mhp" class="form-control" id="default" placeholder="Mã học phần" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">A:</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="A" class="form-control" id="default" placeholder="Điểm A" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">B:</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="B" class="form-control" id="default" placeholder="Điểm B" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">C:</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="C" class="form-control" id="default" placeholder="Điểm C" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <div class="col-sm-offset-2 col-sm-10">

                                                <button type="submit" name="submit" class="btn btn-warning btn-labeled">Tạo điểm mới<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- /.content-container -->

            </div>

            <!-- /.content-wrapper -->

        </div>

        <!-- /.main-wrapper -->

 

        <script src="js/jquery/jquery-2.2.4.min.js"></script>

        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>