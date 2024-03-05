<?php
    session_start();
    error_reporting(0);
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KẾT QUẢ TRA CỨU</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center">KẾT QUẢ TRA CỨU</h2>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section" id="exampl">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h3 align="center">Chi Tiết Điểm Học Phần</h3>
                                                    <hr />
<?php
#-- 
    //$rollid=$_POST['rollid'];
    $msv = $_POST['msv'];
    //$classid=$_POST['class'];
    $mhp = $_POST['mhp'];
    //$_SESSION['rollid']=$rollid;
    $_SESSION['msv'] = $msv;
    //$_SESSION['classid']=$classid;
    $_SESSION['mhp'] = $mhp;
#--
    //$qery = "SELECT   tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.RollId=:rollid and tblstudents.ClassId=:classid ";
    $sql = "SELECT sv.msv, sv.ho_lot, sv.ten, hp.mhp, hp.ten_hoc_phan, dhp.A, dhp.B, dhp.C FROM tbl_sinhvien AS sv INNER JOIN tbl_hocphan AS hp INNER JOIN tbl_diem_hocphan AS dhp WHERE sv.msv=:msv AND hp.mhp=:mhp AND sv.msv=dhp.msv AND hp.mhp=dhp.mhp";
#--
    //$stmt = $dbh->prepare($qery);
    //$stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
    //$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
    //$stmt->execute();

    $cmd = $dbh->prepare($sql);
    $cmd->bindParam(':msv',$msv,PDO::PARAM_STR);
    $cmd->bindParam(':mhp',$mhp,PDO::PARAM_STR);
    $cmd->execute();
#--
    //$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
    
    $rlt=$cmd->fetchAll(PDO::FETCH_OBJ);
#--
    //$cnt=1;
    //if($stmt->rowCount() > 0){
    //    foreach($resultss as $row){

    if($rlt->rowCount() > 0){
        foreach($rlt as $row){
?>

                                                    <p><b>Sinh viên :</b> <?php echo htmlentities($row->ho_lot);?> <?php echo htmlentities($row->ten);?></p>
                                                    <p><b>Mã sinh viên :</b> <?php echo htmlentities($row->msv);?>
                                                    <p><b>Học phần:</b> <?php echo htmlentities($row->ten_hoc_phan);?>(<?php echo htmlentities($row->mhp);?>)
<?php 
        }
    }
?>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">
                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <th style="text-align: center">#</th>
                                                        <th style="text-align: center">Điểm Thành Phần</th>    
                                                        <th style="text-align: center">Điểm Số</th>
                                                    </tr>
                                                </thead>                                                	
                                                <tbody>
<?php
    //$query ="select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";

    //$query= $dbh -> prepare($query);
    //$query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
    //$query->bindParam(':classid',$classid,PDO::PARAM_STR);
    //$query-> execute();  

    //$results = $query -> fetchAll(PDO::FETCH_OBJ);

    //$cnt=1;
    //if($countrow=$query->rowCount()>0){ 
    //    foreach($results as $result){
?>
                                                	<tr>
                                                        <th scope="row" style="text-align: center">1</th>
                                                        <td style="text-align: center">C</td>
                                                        <td style="text-align: center"><?php echo htmlentities($row->C);?></td>
                                                	</tr>
<?php 
    //$totlcount+=$totalmarks;
    //$cnt++;}
?>
                                                    <tr>
                                                        <th scope="row" colspan="2" style="text-align: center">Điểm học phần - số</th>
                                                        <td style="text-align: center"><b><?php echo htmlentities($dhp=($rlt->C*0.1)+($rlt->B*0.3)+($rlt->A*0.6)); ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="2" style="text-align: center">Điểm học phần - chữ</th>           
                                                        <td style="text-align: center"><b><?php echo  htmlentities($dhp); ?> %</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3" align="center">
                                                            <i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)" ></i>
                                                        </td>
                                                    </tr>
<?php 
    //} 
    //else { 
?>     
                                        <div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
<?php 
    //}
?>
                                        </div>
<?php 
    //} 
    //else{
?>

                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            strong>Oh snap!</strong>
<?php
    //echo htmlentities("Invalid Roll Id");
    //}
?>
                                        </div>



                                                </tbody>
                                            </table>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                                           
                                                            <div class="col-sm-6">
                                                               <a href="index.php">Back to Home</a>
                                                            </div>
                                                        </div>

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });


            function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
