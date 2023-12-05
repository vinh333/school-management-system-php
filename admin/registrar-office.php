<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/registrar_office.php";
       $r_users = getAllR_users($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản trị viên - Văn phòng đăng ký</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($r_users != 0) {
     ?>
     <div class="container mt-5">
        <a href="registrar-office-add.php"
           class="btn btn-dark">Thêm Người Dùng Mới</a>

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Họ</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tên đăng nhập</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($r_users as $r_user ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$r_user['id_phong_cong_tac_hssv']?></td>
                    <td><a href="registrar-office-view.php?id_phong_cong_tac_hssv=<?=$r_user['id_phong_cong_tac_hssv']?>">
                         <?=$r_user['ho']?></a></td>
                    <td><?=$r_user['ten']?></td>
                    <td><?=$r_user['ten_dang_nhap']?></td>
                    <td>
                        <a href="registrar-office-edit.php?id_phong_cong_tac_hssv=<?=$r_user['id_phong_cong_tac_hssv']?>"
                           class="btn btn-warning">Chỉnh sửa</a>
                        <a href="registrar-office-delete.php?id_phong_cong_tac_hssv=<?=$r_user['id_phong_cong_tac_hssv']?>"
                           class="btn btn-danger">Xóa</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php } else { ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Trống!
              </div>
         <?php } ?>
     </div>
     
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
    header("Location: ../login.php");
    exit;
  } 
} else {
	header("Location: ../login.php");
	exit;
} 
?>
