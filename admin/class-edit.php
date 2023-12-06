<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['id_lop'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/class.php";

       $class = getClassById($_GET['id_lop'], $conn);

       
       if ($class == 0) {
         header("Location: class.php");
         exit;
       }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản trị viên - Sửa Lớp</title>
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
        <a href="class.php"
           class="btn btn-dark">Quay lại</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/class-edit.php">
        <h3>Sửa Lớp</h3><hr>
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
          <label class="form-label">Mã lớp</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$class['id_lop']?>"
                 name="id_lop">
        </div>
        <div class="mb-3">
          <label class="form-label">Tên lớp</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$class['ten_lop']?>"
                 name="ten_lop">
        </div>
        <input type="text" 
                 class="form-control"
                 value="<?=$class['id_lop']?>"
                 name="id_lop"
                 hidden>

      <button type="submit" 
              class="btn btn-primary">
              Cập nhật</button>
     </form>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(6) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  } else {
    header("Location: class.php");
    exit;
  } 
} else {
	header("Location: class.php");
	exit;
} 
?>
