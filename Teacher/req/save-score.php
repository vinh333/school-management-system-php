<?php 
session_start();
if (isset($_SESSION['id_giao_vien']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
    	

if (isset($_POST['score-1']) &&
    isset($_POST['score-2']) &&
    isset($_POST['score-3']) &&
    isset($_POST['score-4']) &&
    isset($_POST['score-5']) &&
    isset($_POST['aoutof-1']) &&
    isset($_POST['aoutof-2']) &&
    isset($_POST['aoutof-3']) &&
    isset($_POST['aoutof-4']) &&
    isset($_POST['aoutof-5']) &&
    isset($_POST['id_hoc_sinh']) &&
    isset($_POST['id_mon_hoc']) &&
    isset($_POST['nam_hoc']) &&
    isset($_POST['hoc_ky'])
    ) {
    
    include '../../DB_connection.php';


    $score_1 = $_POST['score-1'];
    $aoutof_1 = $_POST['aoutof-1'];

    $score_2 = $_POST['score-2'];
    $aoutof_2 = $_POST['aoutof-2'];

    $score_3 = $_POST['score-3'];
    $aoutof_3 = $_POST['aoutof-3'];

    $score_4 = $_POST['score-4'];
    $aoutof_4 = $_POST['aoutof-4'];

    $score_5 = $_POST['score-5'];
    $aoutof_5 = $_POST['aoutof-5'];

    $id_hoc_sinh = $_POST['id_hoc_sinh'];
    $id_mon_hoc = $_POST['id_mon_hoc'];
    $nam_hoc = $_POST['nam_hoc'];
    $hoc_ky = $_POST['hoc_ky'];
    $id_giao_vien = $_SESSION['id_giao_vien'];

    if(empty($score_1) || empty($score_2) || empty($score_3) || empty($score_4) || empty($score_5) || empty($aoutof_1) || empty($aoutof_2) || empty($aoutof_3) || empty($aoutof_4) || empty($aoutof_5) || empty($id_hoc_sinh) || empty($id_mon_hoc) || empty($nam_hoc) || empty($hoc_ky)){

       $em  = "All fields are required";
        header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&error=$em");
        exit;

    }else {
        $data = '';
        $limit = 0;
        if ($score_1 <= 100 && $aoutof_1 <=100 && $score_1 > 0 && $aoutof_1 > 0 && $score_1 <=  $aoutof_1)  {
            $data .= $score_1." ".$aoutof_1; 
             $limit += $aoutof_1;
        } 
        if($score_2 <= 100 && $aoutof_2 <=100 && $score_2 > 0 && $aoutof_2 > 0 && $score_2 <=  $aoutof_2){
           $data .= ",".$score_2." ".$aoutof_2;
           $limit += $aoutof_2;
        }
        if($score_3 <= 100 && $aoutof_3 <=100 && $score_3 > 0 && $aoutof_3 > 0 && $score_3 <=  $aoutof_3){
           $data .= ",".$score_3." ".$aoutof_3;
           $limit += $aoutof_3;
        } 
        if($score_4 <= 100 && $aoutof_4 <=100 && $score_4 > 0 && $aoutof_4 > 0 && $score_4 <=  $aoutof_4){
           $data .= ",".$score_4." ".$aoutof_4;
           $limit += $aoutof_4;
        }
        if($score_5 <= 100 && $aoutof_5 <=100 && $score_5 > 0 && $aoutof_5 > 0 && $score_5 <=  $aoutof_5){
           $data .= ",".$score_5." ".$aoutof_5;
           $limit += $aoutof_5;
        }
   
        if (empty($data)) {
            $em  = "An error occurred";
            header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&error=$em");
        exit;
        }else if($limit > 100){
            $em  = "Out of boundaries";
            header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&error=$em");
        }
        else {
        if (isset($_POST['diem_hoc_sinh_id'])) {
        $sql = "UPDATE diem_hoc_sinh SET
                ket_qua = ?
                WHERE  nam_hoc=?
                AND hoc_ky=? AND id_hoc_sinh=? AND id_giao_vien=? AND id_mon_hoc=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$data, $hoc_ky, $nam_hoc, $id_hoc_sinh, $id_giao_vien, $id_mon_hoc]);
        $sm = "Điểm đã được cập nhật thành công!";
        header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&success=$sm");
        exit;
          }else {
             $sql = "INSERT INTO diem_hoc_sinh( nam_hoc,hoc_ky, id_hoc_sinh, id_giao_vien, id_mon_hoc, ket_qua)VALUES(?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$hoc_ky, $nam_hoc, $id_hoc_sinh, $id_giao_vien, $id_mon_hoc, $data]);
        $sm = "Điểm đã được tạo thành công!";
        header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&success=$sm");
          }
        }

    }
    
  }else {
  	$em = "An error occurred";
    header("Location: ../classes.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
