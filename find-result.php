<?php
    session_start();
    error_reporting(0);
    include('PDO/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tra Cứu Điểm Học Phần</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/flat/blue.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="login-bg-color bg-black-300">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h4>Tra Cứu Điểm Theo Học Phần</h4>
                                </div>
                            </div>
                            <div class="panel-body p-20">

                           

                                <form action="ketqua_tracuu.php" method="post">
                                	<div class="form-group">
                                		<label for="rollid">Nhập mã sinh viên</label>
                                        <input type="text" class="form-control" id="rollid" placeholder="mã sinh viên" autocomplete="off" name="msv">
                                	</div>
                                    <div class="form-group">
                                        <label for="default">Học phần</label>
                                        <select name="mhp" class="form-control" id="default" required="required">
                                            <option value="">-- Chọn học phần --</option>
<?php 
    $sql = "SELECT * from tbl_hocphan";

    $query = $dbh->prepare($sql);
    $query->execute();

    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0){
        foreach($results as $result){   
?>
                                            <option value="<?php echo htmlentities($result->mhp); ?>"><?php echo htmlentities($result->mhp); ?>&nbsp;-&nbsp;<?php echo htmlentities($result->ten_hoc_phan); ?></option>
<?php
    }
} 
?>
                                            <option value="*">-- Tất cả các học phần --</option>
                                        </select>
                                    </div>

    
                                    <div class="form-group mt-20">
                                        <div class="">
                                            <a  type="button" 
                                                href="index.php" 
                                                class="btn btn-success btn-labeled pull-left">
                                                    <span class="btn-label btn-label-left">
                                                        <i class="fa fa-angle-double-left"></i>
                                                    </span>
                                                    Trang Chủ
                                            </a>                                      
                                            <button type="submit" 
                                                    class="btn btn-success btn-labeled pull-right">
                                                Tra Cứu
                                                <span class="btn-label btn-label-right"><i class="fa fa-angle-double-right"></i></span>
                                            </button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                        <!-- /.panel -->
                        <p class="text-muted text-center">
                            <small style="color: grey">
                                <a href="https://humg.edu.vn/Pages/home.aspx" style="color: grey">TRƯỜNG ĐẠI HỌC MỎ-ĐỊA CHẤT HÀ NỘI</a>
                            </small>
                        </p>
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
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
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
