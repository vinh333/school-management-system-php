<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/registrar_office.php";

       if(isset($_GET['r_user_id'])){
           $r_user_id = $_GET['r_user_id'];
           $r_user = getR_usersById($r_user_id,$conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Người dùng Văn phòng đăng ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($r_user != 0) {
     ?>
     <div class="container mt-5">
         <div class="card" style="width: 22rem;">
          <img src="../img/registrar-office-<?=$r_user['gender']?>.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$r_user['ten_dang_nhap']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Họ và tên đệm: <?=$r_user['ho']?></li>
            <li class="list-group-item">Tên: <?=$r_user['ten']?></li>
            <li class="list-group-item">Tên đăng nhập: <?=$r_user['ten_dang_nhap']?></li>

            <li class="list-group-item">Số nhân viên: <?=$r_user['employee_number']?></li>
            <li class="list-group-item">Địa chỉ: <?=$r_user['address']?></li>
            <li class="list-group-item">Ngày sinh: <?=$r_user['date_of_birth']?></li>
            <li class="list-group-item">Số điện thoại: <?=$r_user['phone_number']?></li>
            <li class="list-group-item">Trình độ: <?=$r_user['qualification']?></li>
            <li class="list-group-item">Địa chỉ email: <?=$r_user['email_address']?></li>
            <li class="list-group-item">Giới tính: <?=$r_user['gender']?></li>
            <li class="list-group-item">Ngày gia nhập: <?=$r_user['date_of_joined']?></li>
          </ul>
          <div class="card-body">
            <a href="registrar-office.php" class="card-link">Quay lại</a>
          </div>
        </div>
     </div>
     <?php 
        } else {
          header("Location: registrar-office.php");
          exit;
        }
     ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>    
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(7) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

    } else {
        header("Location: registrar-office.php");
        exit;
    }

  } else {
    header("Location: ../login.php");
    exit;
  } 
} else {
    header("Location: ../login.php");
    exit;
} 
?>
