<?php
session_start();
error_reporting(0);
include('connect.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    $msg = $error = '';
    if (isset($_POST['submit'])) {
        $masinhvien = $_POST['masinhvien'];
        $mahocphan = $_POST['mahocphan'];
        $diema = $_POST['diema'];
        $diemb = $_POST['diemb'];
        $diemc = $_POST['diemc'];
        require 'connect.php';
        $sql = "UPDATE tbl_diemhocphan SET mhp = :mahocphan, A = :diema, B = :diemb, C = :diemc WHERE msv = :masinhvien";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':mahocphan', $mahocphan, PDO::PARAM_STR);
        $stmt->bindParam(':diema', $diema, PDO::PARAM_STR);
        $stmt->bindParam(':diemb', $diemb, PDO::PARAM_STR);
        $stmt->bindParam(':diemc', $diemc, PDO::PARAM_STR);
        $stmt->bindParam(':masinhvien', $masinhvien, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $msg = "Bạn đã sửa điểm thành công!";
        } else {
           $error = "Error: " . $stmt->errorInfo()[2];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cập nhập thông tin</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
<link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
<link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
<link rel="stylesheet" href="css/main.css" media="screen">
<script src="js/modernizr/modernizr.min.js"></script>
<style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
</style>
</head>
<body class="top-navbar-fixed">
<div class="main-wrapper">
<?php include('includes/topbar.php'); ?>
<div class="content-wrapper">
<div class="content-container">
<?php include('includes/leftbar.php'); ?>
<div class="main-page">
<div class="container-fluid">
<div class="row page-title-div">
<div class="col-md-6">
<h2 class="title">Cập nhập điểm</h2>
</div>
</div>
<div class="row breadcrumb-div">
<div class="col-md-6">
<ul class="breadcrumb">
<li><a href="dashboard.php"><i class="fa fa-home"></i> Trang chủ</a></li>
<li><a href = "#"> Mã sinh viên</a></li>
<li class="active"><a>Mã học phần</a></li>
<li>A</li>
<li>B</li>
<li>C</li>
</ul>
</div>
</div>
</div>
<section class="section">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">
<h5>Cập nhật điểm học phần</h5>
</div>
</div>
<?php if ($msg) { ?>
<div class="alert alert-success left-icon-alert" role="alert">
<strong>Well done!</strong><?php echo htmlentities($msg); ?>
</div>
<?php } else if ($error) { ?>
<div class="alert alert-danger left-icon-alert" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
</div>
<?php } ?>
<div class="panel-body p-20">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="form-group has-success">
<label for="success" class="control-label">Mã sinh viên: </label>
<div class="">
<input type="text" name="masinhvien" class="form-control" required="required" id="success">
<span class="help-block">Bắt buộc</span>
</div>
</div>
<div class="form-group has-success">
<label for="success" class="control-label">Mã học phần: </label>
<div class="">
<input type="text" name="mahocphan" class="form-control" required="required" id="success">
<span class="help-block">Bắt buộc</span>
</div>
</div>
<div class="form-group has-success">
<label for="success" class="control-label">A: </label>
<div class="">
<input type="text" name="diema" class="form-control" required="required" id="success">
<span class="help-block">Bắt buộc</span>
</div>
</div>
<div class="form-group has-success">
<label for="success" class="control-label">B: </label>
<div class="">
<input type="text" name="diemb" class="form-control" required="required" id="success">
<span class="help-block">Bắt buộc</span>
</div>
</div>
<div class="form-group has-success">
<label for="success" class="control-label">C: </label>
<div class="">
<input type="text" name="diemc" class="form-control" required="required" id="success">
<span class="help-block">Bắt buộc</span>
</div>
</div>
<div class="form-group has-success">
<div class="">
<button type="submit" name="submit" class="btn btn-info btn-labeled">Cập nhập điểm<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>
<script src="js/prism/prism.js"></script>
<script src="js/DataTables/datatables.min.js"></script>
<script src="js/main.js"></script>
<script>
        $(function($) {
            $('#example').DataTable();
            $('#example2').DataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false
            });
            $('#example3').DataTable();
        });
</script>
</body>
</html>