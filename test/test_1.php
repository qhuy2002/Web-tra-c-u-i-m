<?php
  session_start();
  error_reporting(0);
  include('../includes/config.php');

  $msv = $_POST['msv'];
  $mhp = $_POST['mhp'];
  
  $_SESSION['msv'] = $msv;
  $_SESSION['mhp'] = $mhp;

  $sql = "SELECT sv.msv, sv.ho_lot, sv.ten, hp.mhp, hp.ten_hoc_phan, dhp.A, dhp.B, dhp.C FROM tbl_sinhvien AS sv INNER JOIN tbl_hocphan AS hp INNER JOIN tbl_diem_hocphan AS dhp WHERE sv.msv=:msv AND hp.mhp=:mhp AND sv.msv=dhp.msv AND hp.mhp=dhp.mhp";

  $cmd = $dbh->prepare($sql);
  $cmd->bindParam(':msv',$msv,PDO::PARAM_STR);
  $cmd->bindParam(':mhp',$mhp,PDO::PARAM_STR);
  $cmd->execute();

  $rlt=$cmd->fetchAll(PDO::FETCH_OBJ);

  //foreach ($rlt as $r) {
  //  echo $r->A . '-' . $r->B . '-' . $r->C;
  //}

  if($cmd->rowCount() > 0){
    foreach($rlt as $row){
?>

<p><b>Sinh viên :</b> <?php echo htmlentities($row->ho_lot);?> <?php echo htmlentities($row->ten);?></p>
<p><b>Mã sinh viên :</b> <?php echo htmlentities($row->msv);?>
<p><b>Học phần:</b> <?php echo htmlentities($row->ten_hoc_phan);?> (<?php echo htmlentities($row->mhp);?>)

<?php
    }
  }
?>