<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/student.php";
       include "data/subject.php";
       include "data/class.php";
       include "data/grade.php";

       if(isset($_GET['id_hoc_sinh'])){

       $id_hoc_sinh = $_GET['id_hoc_sinh'];
       $scores = getScoreById($id_hoc_sinh, $conn);

       $student = getStudentById($id_hoc_sinh, $conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sinh Viên - Giáo Viên</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
    <?php 
            include "inc/navbar.php";

        if ($student != 0) {
     ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <!-- Student Information Card -->
                    <div class="card" style="width: 100%;">
                        <img src="../img/student-<?=$student['gioi_tinh']?>.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">@<?=$student['ten_dang_nhap']?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Tên: <?=$student['ho']?></li>
                            <li class="list-group-item">Họ: <?=$student['ten']?></li>
                            <li class="list-group-item">Tên đăng nhập: <?=$student['ten_dang_nhap']?></li>
                            <li class="list-group-item">Địa chỉ: <?=$student['dia_chi']?></li>
                            <li class="list-group-item">Ngày sinh: <?=$student['ngay_sinh']?></li>
                            <li class="list-group-item">Email: <?=$student['email']?></li>
                            <li class="list-group-item">Giới tính: <?=$student['gioi_tinh']?></li>
                            <li class="list-group-item">Ngày tham gia: <?=$student['ngay_tham_gia']?></li>
                            <li class="list-group-item">Lớp: 
                                <?php 
                                    $class = $student['id_lop'];
                                    $s = getClassById($class, $conn);
                                    echo $s['ten_lop'];
                                ?>
                            </li>
                            <li class="list-group-item">Họ tên cha: <?=$student['ho_ten_cha']?></li>
                            <li class="list-group-item">Họ tên mẹ: <?=$student['ho_ten_me']?></li>
                            <li class="list-group-item">Số điện thoại phụ huynh: <?=$student['so_dien_thoai_phu_huynh']?></li>
                            <li class="list-group-item">Thêm bảng điểm sinh viên vào đây </li>
                        </ul>
                        <div class="card-body">
                            <a href="student.php" class="card-link">Quay lại</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Scores Table -->
                    <div class="table-responsive score-table" style="max-width: 800px;">
                        <table class="table table-bordered mt-1 mb-5 n-table">
                            <?php
                            if ($scores != 0) {
                                $check = 0;
                                foreach ($scores as $score) {
                                    if ($score['nam_hoc'] == $check) {
                                        $check = $score['nam_hoc'];
                                        $csubject = getSubjectById($score['id_mon_hoc'], $conn);
                                        ?>
                                        <tr>
                                            <td><?= $csubject['ten_mon_hoc'] ?></td>
                                            <td><?= $csubject['ma_mon_hoc'] ?></td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $outOf = 0;
                                                $ket_qua = explode(',', trim($score['ket_qua']));
                                                foreach ($ket_qua as $result) {
                                                    $temp = explode(' ', trim($result));
                                                    $total += $temp[0];
                                                    ?>
                                                    <small class="border p-1"><?= $temp[0] ?></small>&nbsp;
                                                <?php } ?>
                                            </td>
                                            <td><?= $total ?> / <?= 50 ?></td>
                                            <td><?= calculateAverage($ket_qua) ?></td>
                                            <td><?= gradeCalc($total) ?></td>
                                            <td><?= $score['hoc_ky'] ?></td>
                                        </tr>
                                    <?php } else {
                                        $check = $score['nam_hoc'];
                                        $csubject = getSubjectById($score['id_mon_hoc'], $conn);
                                        ?>
                                        </tbody>
                                        </table>
                                        </div><br />
                                        <div class="table-responsive" style="width: 90%; max-width: 800px;">
                                            <table class="table table-bordered mt-1 mb-5 n-table">
                                                <caption style="caption-side: top">Năm - <?= $score['nam_hoc'] ?> </caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Mã Môn Học</th>
                                                        <th scope="col">Tên Môn Học</th>
                                                        <th scope="col">Kết Quả</th>
                                                        <th scope="col">Tổng</th>
                                                        <th scope="col">Điểm Trung Bình</th>
                                                        <th scope="col">Xếp Loại</th>
                                                        <th scope="col">Học Kỳ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><?= $csubject['ma_mon_hoc'] ?></td>
                                                    <td><?= $csubject['ten_mon_hoc'] ?></td>
                                                    <td>
                                                        <?php
                                                        $total = 0;
                                                        $outOf = 0;
                                                        $ket_qua = explode(',', trim($score['ket_qua']));
                                                        foreach ($ket_qua as $result) {
                                                            $temp = explode(' ', trim($result));
                                                            $total += $temp[0];
                                                            ?>
                                                            <small class="border p-1"><?= $temp[0] ?></small>&nbsp;
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $total ?> / <?= 50 ?></td>
                                                    <td><?= calculateAverage($ket_qua) ?></td>
                                                    <td><?= gradeCalc($total) ?></td>
                                                    <td><?= $score['hoc_ky'] ?></td>
                                                </tr>
                                    <?php }
                                }
                            } else {
                                ?>
                                <div class="alert alert-info w-450 m-5" role="alert">
                                    Trống!
                                </div>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div><br />

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $("#navLinks li:nth-child(3) a").addClass('active');
                        });
                    </script>
                </div>
            </div>
        </div>
     <?php 
        } else {
          header("Location: student.php");
          exit;
        }
     ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<?php 

    }else {
        header("Location: student.php");
        exit;
    }

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>
