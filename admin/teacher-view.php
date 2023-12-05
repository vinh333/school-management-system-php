<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/teacher.php";
       include "data/subject.php";
       include "data/class.php";

       if(isset($_GET['id_giao_vien'])){

       $id_giao_vien = $_GET['id_giao_vien'];

       $teacher = getTeacherById($id_giao_vien,$conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Teachers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($teacher != 0) {
     ?>
     <div class="container mt-5">
         <div class="card" style="width: 22rem;">
          <img src="../img/teacher-<?=$teacher['gioi_tinh']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$teacher['ten_dang_nhap']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Họ và Tên Đệm: <?=$teacher['ho']?></li>
            <li class="list-group-item">Tên: <?=$teacher['ten']?></li>
            <li class="list-group-item">Tên Đăng Nhập: <?=$teacher['ten_dang_nhap']?></li>

            <li class="list-group-item">Số Nhân Viên: <?=$teacher['so_hieu_giao_vien']?></li>
            <li class="list-group-item">Địa Chỉ: <?=$teacher['dia_chi']?></li>
            <li class="list-group-item">Ngày Sinh: <?=$teacher['ngay_sinh']?></li>
            <li class="list-group-item">Số Điện Thoại: <?=$teacher['so_dien_thoai']?></li>
            <li class="list-group-item">Trình Độ: <?=$teacher['trinh_do']?></li>
            <li class="list-group-item">Email: <?=$teacher['email']?></li>
            <li class="list-group-item">Giới Tính: <?=$teacher['gioi_tinh']?></li>
            <li class="list-group-item">Ngày Tham Gia: <?=$teacher['ngay_tham_gia']?></li>

            <li class="list-group-item">Môn Học: 
                <?php 
                   $s = '';
                   $mon_hoc = str_split(trim($teacher['mon_hoc']));
                   foreach ($mon_hoc as $subject) {
                      $s_temp = getSubjectById($subject, $conn);
                      if ($s_temp != 0) 
                        $s .=$s_temp['ten_mon_hoc'].', ';
                   }
                   echo $s;
                ?>
            </li>
            <li class="list-group-item">Lớp: 
                  <?php 
                     $c = '';
                     $classes = str_split(trim($teacher['danh_sach_lop']));

                     foreach ($classes as $id_lop) {
                         $class = getClassById($id_lop, $conn);

                        
                        if ($class != 0) 
                          $c .=$class['ten_lop'].', ';
                     }
                     echo $c;

                  ?>
            </li>
            
          </ul>
          <div class="card-body">
            <a href="teacher.php" class="card-link">Quay Lại</a>
          </div>
        </div>
     </div>
     <?php 
        }else {
          header("Location: teacher.php");
          exit;
        }
     ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>    
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

    }else {
        header("Location: teacher.php");
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
