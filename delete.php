<?php
error_reporting(E_ALL);
include('connect.php');
$msg = $error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $masinhvien = $_POST['masinhvien'];
    try {

        $sql = "DELETE FROM tbl_diemhocphan WHERE msv = ?";

        $stmt = $dbh->prepare($sql);

        $stmt->execute([$masinhvien]);
        $msg = "Bạn đã xóa điểm học phần thành công!";
    } catch (PDOException $e) {
        $error = "Xảy ra lỗi khi xóa: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Xóa học phần</title>
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
<h2 class="title">Xóa điểm học phần</h2>
</div>
</div>
<div class="row breadcrumb-div">
<div class="col-md-6">
<ul class="breadcrumb">
<li><a href="dashboard.php"><i class="fa fa-home"></i> Trang chủ</a></li>
<li> <a href = "#">Xóa học phần</a></li>
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
<h5>Xóa điểm học phần</h5>
</div>
</div>
<?php if ($msg) { ?>
            <div class="alert alert-success left-icon-alert" role="alert">
                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
            </div>
        <?php } else if ($error) { ?>
            <div class="alert alert-danger left-icon-alert" role="alert">
                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
            </div>
        <?php } ?>
        <div class="panel-body p-20">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group has-success">
                    <label for="success" class="control-label">Mã sinh viên:</label>
                    <div class="">
                        <input type="text" name="masinhvien" class="form-control" required="required" id="success">
                    </div>
                </div>
                <div class="form-group has-success">
                    <div class="">
                        <button type="submit" name="submit" class="btn btn-dark btn-labeled">Xóa điểm<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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