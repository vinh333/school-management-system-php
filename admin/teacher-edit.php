<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['id_giao_vien'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/subject.php";
       include "data/class.php";
       include "data/teacher.php";
       $mon_hoc = getAllSubjects($conn);
       $classes  = getAllClasses($conn);
       
       
       $id_giao_vien = $_GET['id_giao_vien'];
       $teacher = getTeacherById($id_giao_vien, $conn);

       if ($teacher == 0) {
         header("Location: teacher.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Sửa Thông Tin Giáo Viên</title>
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
        <a href="teacher.php"
           class="btn btn-dark">Quay Lại</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/teacher-edit.php">
        <h3>Sửa Thông Tin Giáo Viên</h3><hr>
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
          <label class="form-label">Họ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['ho']?>" 
                 name="ho">
        </div>
        <div class="mb-3">
          <label class="form-label">Tên</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['ten']?>"
                 name="ten">
        </div>
        <div class="mb-3">
          <label class="form-label">Tên Đăng Nhập</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['ten_dang_nhap']?>"
                 name="ten_dang_nhap">
        </div>
        <div class="mb-3">
          <label class="form-label">Địa Chỉ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['dia_chi']?>"
                 name="dia_chi">
        </div>
        <div class="mb-3">
          <label class="form-label">Số Nhân Viên</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['so_hieu_giao_vien']?>"
                 name="so_hieu_giao_vien">
        </div>
        <div class="mb-3">
          <label class="form-label">Ngày Sinh</label>
          <input type="date" 
                 class="form-control"
                 value="<?=$teacher['ngay_sinh']?>"
                 name="ngay_sinh">
        </div>
        <div class="mb-3">
          <label class="form-label">Số Điện Thoại</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['so_dien_thoai']?>"
                 name="so_dien_thoai">
        </div>
        <div class="mb-3">
          <label class="form-label">Trình Độ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['trinh_do']?>"
                 name="trinh_do">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$teacher['email']?>"
                 name="email">
        </div>
        <div class="mb-3">
          <label class="form-label">Giới Tính</label><br>
          <input type="radio"
                 value="Nam"
                 <?php if($teacher['gioi_tinh'] == 'Nam') echo 'checked';  ?> 
                 name="gioi_tinh"> Nam
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Nu"
                 <?php if($teacher['gioi_tinh'] == 'Nu') echo 'checked';  ?> 
                 name="gioi_tinh"> Nữ
        </div>
        <input type="text"
                value="<?=$teacher['id_giao_vien']?>"
                name="id_giao_vien"
                hidden>

        <div class="mb-3">
          <label class="form-label">Môn Học</label>
          <div class="row row-cols-5">
            <?php 
            $id_mon_hocs = str_split(trim($teacher['mon_hoc']));
            foreach ($mon_hoc as $subject){ 
              $checked =0;
              foreach ($id_mon_hocs as $id_mon_hoc ) {
                if ($id_mon_hoc == $subject['id_mon_hoc']) {
                   $checked =1;
                }
              }
            ?>
            <div class="col">
              <input type="checkbox"
                     name="mon_hoc[]"
                     <?php if($checked) echo "checked"; ?>
                     value="<?=$subject['id_mon_hoc']?>">
                     <?=$subject['ten_mon_hoc']?>
            </div>
            <?php } ?>
             
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Lớp Học</label>
          <div class="row row-cols-5">
            <?php 
            $id_lops = str_split(trim($teacher['danh_sach_lop']));
            foreach ($classes as $class){ 
              $checked =0;
              foreach ($id_lops as $id_lop ) {
                if ($id_lop == $class['id_lop']) {
                   $checked =1;
                }
              }
              $grade = getClassById($class['id_lop'], $conn);
            ?>
            <div class="col">
              <input type="checkbox"
                    name="classes[]"
                    <?php if($checked) echo "checked"; ?>
                    value="<?=$class['id_lop']?>">
              <?=$class['ten_lop']?>
            </div>

            <?php } ?>
             
          </div>
        </div>

      <button type="submit" 
              class="btn btn-primary">
              Cập Nhật</button>
     </form>

     <form method="post"
              class="shadow p-3 my-5 form-w" 
              action="req/teacher-change.php"
              id="change_password">
        <h3>Đổi Mật Khẩu</h3><hr>
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
            <label class="form-label">Mật Khẩu Admin</label>
                <input type="mat_khau" 
                       class="form-control"
                       name="admin_pass"> 
          </div>

            <label class="form-label">Mật Khẩu Mới</label>
            <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="new_pass"
                       id="passInput">
                <button class="btn btn-secondary"
                        id="gBtn">
                        Ngẫu Nhiên</button>
            </div>
            
          </div>
          <input type="text"
                value="<?=$teacher['id_giao_vien']?>"
                name="id_giao_vien"
                hidden>

          <div class="mb-3">
            <label class="form-label">Xác Nhận Mật Khẩu Mới</label>
                <input type="text" 
                       class="form-control"
                       name="c_new_pass"
                       id="passInput2"> 
          </div>
          <button type="submit" 
              class="btn btn-primary">
              Đổi Mật Khẩu</button>
        </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>    
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

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

  }else {
    header("Location: teacher.php");
    exit;
  } 
}else {
    header("Location: teacher.php");
    exit;
} 

?>
