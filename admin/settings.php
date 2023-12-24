<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/setting.php";
       $setting = getSetting($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Cài Đặt</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
     ?>
   <div class="container mt-5">
        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/setting-edit.php">
        <h3>Chỉnh Sửa</h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>
        <div class="mb-3">
          <label class="form-label">Tên Trường</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['ten_truong']?>" 
                 name="ten_truong">
        </div>
        <div class="mb-3">
          <label class="form-label">Slogan</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['phat_ngon']?>" 
                 name="phat_ngon">
        </div>
        <div class="mb-3">
                <label class="form-label">Giới Thiệu</label>
                <textarea class="form-control" name="gioi_thieu"
                          rows="4"><?=$setting['gioi_thieu']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Năm Học Hiện Tại</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['hoc_ky']?>" 
                 name="nam_hoc">
        </div>
        <div class="mb-3">
          <label class="form-label">Học Kỳ Hiện Tại</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['nam_hoc']?>"
                 name="hoc_ky">
        </div>
      <button type="submit" 
              class="btn btn-primary">
              Cập Nhật</button>
     </form>
 </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(8) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 
?>
