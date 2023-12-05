<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       $grades = getAllGrades($conn);
       $sections = getAllSections($conn);


       $ho = '';
       $ten = '';
       $uname = '';
       $dia_chi = '';
       $email = '';
       $pfn = '';
       $pln = '';
       $ppn = '';


       if (isset($_GET['ho'])) $ho = $_GET['ho'];
       if (isset($_GET['ten'])) $ten = $_GET['ten'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['dia_chi'])) $dia_chi = $_GET['dia_chi'];
       if (isset($_GET['email'])) $email = $_GET['email'];
       if (isset($_GET['pfn'])) $pfn = $_GET['pfn'];
       if (isset($_GET['pln'])) $pln = $_GET['pln'];
       if (isset($_GET['ppn'])) $ppn = $_GET['ppn'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Thêm Sinh Viên Mới</title>
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
        <a href="student.php"
           class="btn btn-dark">Quay Lại</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/student-add.php">
        <h3>Thêm Sinh Viên Mới</h3><hr>
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
          <label class="form-label">Địa Chỉ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$dia_chi?>"
                 name="dia_chi">
        </div>
        <div class="mb-3">
          <label class="form-label">Địa Chỉ Email</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$email?>"
                 name="email">
        </div>
        <div class="mb-3">
          <label class="form-label">Ngày Sinh</label>
          <input type="date" 
                 class="form-control"
                 name="ngay_sinh">
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
        </div><br><hr>
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
                      Ngẫu Nhiên</button>
          </div>
          
        </div><br><hr>
        <div class="mb-3">
          <label class="form-label">Tên Phụ Huynh</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$pfn?>"
                 name="ho_ten_cha">
        </div>
        <div class="mb-3">
          <label class="form-label">Họ Phụ Huynh</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$pln?>"
                 name="ho_ten_me">
        </div>
        <div class="mb-3">
          <label class="form-label">Số Điện Thoại Phụ Huynh</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$ppn?>"
                 name="so_dien_thoai_phu_huynh">
        </div><br><hr>
        <div class="mb-3">
          <label class="form-label">Khối</label>
          <div class="row row-cols-5">
            <?php foreach ($grades as $grade): ?>
            <div class="col">
              <input type="radio"
                     name="grade"
                     value="<?=$grade['grade_id']?>">
                     <?=$grade['grade_code']?>-<?=$grade['grade']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Lớp</label>
          <div class="row row-cols-5">
            <?php foreach ($sections as $section): ?>
            <div class="col">
              <input type="radio"
                     name="section"
                     value="<?=$section['section_id']?>">
                     <?=$section['section']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>

      <button type="submit" class="btn btn-primary">Đăng Ký</button>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
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
