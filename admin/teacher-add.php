<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/subject.php";
       include "data/class.php";
       $mon_hoc = getAllSubjects($conn);
       $classes = getAllClasses($conn);


       $ho = '';
       $ten = '';
       $uname = '';
       $dia_chi = '';
       $en = '';
       $pn = '';
       $qf = '';
       $email = '';

       if (isset($_GET['ho'])) $ho = $_GET['ho'];
       if (isset($_GET['ten'])) $ten = $_GET['ten'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['dia_chi'])) $dia_chi = $_GET['dia_chi'];
       if (isset($_GET['en'])) $en = $_GET['en'];
       if (isset($_GET['pn'])) $pn = $_GET['pn'];
       if (isset($_GET['qf'])) $qf = $_GET['qf'];
       if (isset($_GET['email'])) $email = $_GET['email'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Thêm Giáo Viên Mới</title>
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
              action="req/teacher-add.php">
        <h3>Thêm Giáo Viên Mới</h3><hr>
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
          <label class="form-label">Tên</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$ho?>" 
                 name="ho">
        </div>
        <div class="mb-3">
          <label class="form-label">Họ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$ten?>"
                 name="ten">
        </div>
        <div class="mb-3">
          <label class="form-label">Tên Đăng Nhập</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$uname?>"
                 name="ten_dang_nhap">
        </div>
        <div class="mb-3">
          <label class="form-label">Mật Khẩu</label>
          <div class="input-group mb-3">
              <input type="text" 
                     class="form-control"
                     name="pass"
                     id="passInput">
              <button class="btn btn-secondary"
                      id="gBtn">
                      Ngẫu nhiên</button>
          </div>
          
        </div>
        <div class="mb-3">
          <label class="form-label">Địa Chỉ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$dia_chi?>"
                 name="dia_chi">
        </div>
        <div class="mb-3">
          <label class="form-label">Số Hiệu Giáo Viên</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$en?>"
                 name="so_hieu_giao_vien">
        </div>
        <div class="mb-3">
          <label class="form-label">Số Điện Thoại</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$pn?>"
                 name="so_dien_thoai">
        </div>
        <div class="mb-3">
          <label class="form-label">Trình Độ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$qf?>"
                 name="trinh_do">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$email?>"
                 name="email">
        </div>
        <div class="mb-3">
          <label class="form-label">Giới Tính</label><br>
          <input type="radio"
                 value="Nam"
                 checked 
                 name="gioi_tinh"> Nam
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Nu"
                 name="gioi_tinh"> Nữ
        </div>
        <div class="mb-3">
          <label class="form-label">Ngày Sinh</label>
          <input type="date" 
                 class="form-control"
                 value=""
                 name="ngay_sinh">
        </div>
        <div class="mb-3">
          <label class="form-label">Môn Học</label>
          <div class="row row-cols-5">
            <?php foreach ($mon_hoc as $subject): ?>
            <div class="col">
              <input type="checkbox"
                     name="mon_hoc[]"
                     value="<?=$subject['id_mon_hoc']?>">
                     <?=$subject['ten_mon_hoc']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Lớp</label>
          <div class="row row-cols-5">
            <?php foreach ($classes as $class): ?>
            <div class="col">
              <input type="checkbox"
                     name="classes[]"
                     value="<?=$class['id_lop']?>">
                     <?php 
                        // $grade = getGradeById($class['grade'], $conn); 
                        // $section = getSectioById($class['section'], $conn); 
                      ?>
                     <?=$class['ten_lop']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>

      <button type="submit" class="btn btn-primary">Thêm</button>
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
           passInput.value = result;
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
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>
