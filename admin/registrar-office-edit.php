<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['r_user_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/registrar_office.php";

       $r_user_id = $_GET['r_user_id'];
       $r_user = getR_usersById($r_user_id, $conn);

       if ($r_user == 0) {
         header("Location: registrar-office.php");
         exit;
       }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Chỉnh sửa Người dùng Văn phòng đăng ký</title>
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
        <a href="registrar-office.php" class="btn btn-dark">Quay lại</a>

        <form method="post" class="shadow p-3 mt-5 form-w" action="req/registrar-office-edit.php">
        <h3>Chỉnh sửa Người dùng Văn phòng đăng ký</h3><hr>
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
          <label class="form-label">Họ và tên đệm</label>
          <input type="text" class="form-control" value="<?=$r_user['ho']?>" name="ho">
        </div>
        <div class="mb-3">
          <label class="form-label">Tên</label>
          <input type="text" class="form-control" value="<?=$r_user['ten']?>" name="ten">
        </div>
        <div class="mb-3">
          <label class="form-label">Tên đăng nhập</label>
          <input type="text" class="form-control" value="<?=$r_user['ten_dang_nhap']?>" name="ten_dang_nhap">
        </div>
        <div class="mb-3">
          <label class="form-label">Địa chỉ</label>
          <input type="text" class="form-control" value="<?=$r_user['address']?>" name="address">
        </div>
        <div class="mb-3">
          <label class="form-label">Số nhân viên</label>
          <input type="text" class="form-control" value="<?=$r_user['employee_number']?>" name="employee_number">
        </div>
        <div class="mb-3">
          <label class="form-label">Ngày sinh</label>
          <input type="date" class="form-control" value="<?=$r_user['date_of_birth']?>" name="date_of_birth">
        </div>
        <div class="mb-3">
          <label class="form-label">Số điện thoại</label>
          <input type="text" class="form-control" value="<?=$r_user['phone_number']?>" name="phone_number">
        </div>
        <div class="mb-3">
          <label class="form-label">Trình độ</label>
          <input type="text" class="form-control" value="<?=$r_user['qualification']?>" name="qualification">
        </div>
        <div class="mb-3">
          <label class="form-label">Địa chỉ email</label>
          <input type="text" class="form-control" value="<?=$r_user['email_address']?>" name="email_address">
        </div>
        <div class="mb-3">
          <label class="form-label">Giới tính</label><br>
          <input type="radio" value="Nam" <?php if($r_user['gender'] == 'Nam') echo 'checked';  ?> name="gender"> Nam
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" value="Nữ" <?php if($r_user['gender'] == 'Nữ') echo 'checked';  ?> name="gender"> Nữ
        </div>
        <input type="text" value="<?=$r_user['r_user_id']?>" name="r_user_id" hidden>

      <button type="submit" class="btn btn-primary">Cập nhật</button>
     </form>

     <form method="post" class="shadow p-3 my-5 form-w" action="req/registrar-office-change.php" id="change_password">
        <h3>Đổi mật khẩu</h3><hr>
          <?php if (isset($_GET['perror'])) { ?>
            <div class="alert alert-danger" role="alert">
             <?=$_GET['perror']?>
            </div>
          <?php } ?>
          <?php if (isset($_GET['psuccess'])) { ?>
            <div class="alert alert-success" role="alert">
             <?=$_GET['psuccess']?>
            </div>
          <?php } ?>

       <div class="mb-3">
            <div class="mb-3">
            <label class="form-label">Mật khẩu Admin</label>
                <input type="password" class="form-control" name="admin_pass"> 
          </div>

            <label class="form-label">Mật khẩu mới</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="new_pass" id="passInput">
                <button class="btn btn-secondary" id="gBtn">Ngẫu nhiên</button>
            </div>
            
          </div>
          <input type="text" value="<?=$r_user['r_user_id']?>" name="r_user_id" hidden>

          <div class="mb-3">
            <label class="form-label">Xác nhận mật khẩu mới</label>
                <input type="text" class="form-control" name="c_new_pass" id="passInput2"> 
          </div>
          <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
        </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>    
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(7) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * charactersLength));

           }
           var passInput = document.getElementById('passInput');
           var passInput2 = document.getElementById('passInput2');
           passInput.value = result;
           passInput2.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
        });
    </script>

</body>
</html>
<?php 

  } else {
    header("Location: teacher.php");
    exit;
  } 
} else {
	header("Location: teacher.php");
	exit;
} 
?>
