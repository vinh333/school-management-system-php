<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['student_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/subject.php";
       include "data/student.php";
       $subjects = getAllSubjects($conn);
       $grades = getAllGrades($conn);
       $sections = getAllsections($conn);
       
       $student_id = $_GET['student_id'];
       $student = getStudentById($student_id, $conn);

       if ($student == 0) {
         header("Location: student.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Chỉnh sửa Sinh viên</title>
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
           class="btn btn-dark">Quay lại</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/student-edit.php">
        <h3>Chỉnh sửa thông tin Sinh viên</h3><hr>
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
                 value="<?=$student['fname']?>" 
                 name="fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Họ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['lname']?>"
                 name="lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Địa chỉ</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['address']?>"
                 name="address">
        </div>
        <div class="mb-3">
          <label class="form-label">Địa chỉ Email</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['email_address']?>"
                 name="email_address">
        </div>
        <div class="mb-3">
          <label class="form-label">Ngày sinh</label>
          <input type="date" 
                 class="form-control"
                 value="<?=$student['date_of_birth']?>"
                 name="date_of_birth">
        </div>
        <div class="mb-3">
          <label class="form-label">Giới tính</label><br>
          <input type="radio"
                 value="Nam"
                 <?php if($student['gender'] == 'Nam') echo 'checked';  ?> 
                 name="gender"> Nam
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Nữ"
                 <?php if($student['gender'] == 'Nữ') echo 'checked';  ?> 
                 name="gender"> Nữ
        </div>

        <div class="mb-3">
          <label class="form-label">Tên đăng nhập</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['username']?>"
                 name="username">
        </div>
        <input type="text"
                value="<?=$student['student_id']?>"
                name="student_id"
                hidden>

        <div class="mb-3">
          <label class="form-label">Khối</label>
          <div class="row row-cols-5">
            <?php 
            $grade_ids = str_split(trim($student['grade']));
            foreach ($grades as $grade){ 
              $checked =0;
              foreach ($grade_ids as $grade_id ) {
                if ($grade_id == $grade['grade_id']) {
                   $checked =1;
                }
              }
            ?>
            <div class="col">
              <input type="radio"
                     name="grade"
                     <?php if($checked) echo "checked"; ?>
                     value="<?=$grade['grade_id']?>">
                     <?=$grade['grade_code']?>-<?=$grade['grade']?>
            </div>
            <?php } ?>
             
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Khối</label>
          <div class="row row-cols-5">
            <?php 
            $section_ids = str_split(trim($student['section']));
            foreach ($sections as $section){ 
              $checked =0;
              foreach ($section_ids as $section_id ) {
                if ($section_id == $section['section_id']) {
                   $checked =1;
                }
              }
            ?>
            <div class="col">
              <input type="radio"
                     name="section"
                     <?php if($checked) echo "checked"; ?>
                     value="<?=$section['section_id']?>">
                     <?=$section['section']?>
            </div>
            <?php } ?>
             
          </div>
        </div>
        <br><hr>

        <div class="mb-3">
          <label class="form-label">Tên phụ huynh (bố/mẹ)</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['parent_fname']?>"
                 name="parent_fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Họ phụ huynh (bố/mẹ)</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['parent_lname']?>"
                 name="parent_lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Số điện thoại phụ huynh (bố/mẹ)</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['parent_phone_number']?>"
                 name="parent_phone_number">
        </div>

        

      <button type="submit" 
              class="btn btn-primary">
              Cập nhật</button>
     </form>

     <form method="post"
              class="shadow p-3 my-5 form-w" 
              action="req/student-change.php"
              id="change_password">
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
            <label class="form-label">Mật khẩu của Admin</label>
                <input type="password" 
                       class="form-control"
                       name="admin_pass"> 
          </div>

            <label class="form-label">Mật khẩu mới</label>
            <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="new_pass"
                       id="passInput">
                <button class="btn btn-secondary"
                        id="gBtn">
                        Ngẫu nhiên</button>
            </div>
            
          </div>
          <input type="text"
                value="<?=$student['student_id']?>"
                name="student_id"
                hidden>

          <div class="mb-3">
            <label class="form-label">Xác nhận mật khẩu mới</label>
                <input type="text" 
                       class="form-control"
                       name="c_new_pass"
                       id="passInput2"> 
          </div>
          <button type="submit" 
              class="btn btn-primary">
              Đổi mật khẩu</button>
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
    header("Location: student.php");
    exit;
  } 
}else {
	header("Location: student.php");
	exit;
} 

?>
