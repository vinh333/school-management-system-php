<?php 
session_start();
if (isset($_SESSION['id_giao_vien']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
       include "../DB_connection.php";
       include "data/student.php";
       include "data/class.php";
       if (!isset($_GET['id_lop'])) {
           header("Location: students.php");
           exit;
       }
       $id_lop = $_GET['id_lop'];
       $students = getAllStudents($conn);

       $class = getClassById($id_lop, $conn);

 ?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giáo viên - Học sinh</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
    include "inc/navbar.php";
        if ($students != 0) {
            $check = 0;
     ?>
     
  <?php $i = 0; foreach ($students as $student ) { 
       
       if ($class['id_lop'] == $student['id_lop'] ) { 
           $i++; 
           if ($i == 1) { 
               $check++;
    ?>
        <div class="container mt-5">
           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Họ và tên đệm</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tên đăng nhập</th>
                    <th scope="col">Lớp</th>
                  </tr>
                </thead>
                <tbody>  
              <?php } ?>          
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$student['id_hoc_sinh']?></td>
                    <td>
                      <a href="student-grade.php?id_hoc_sinh=<?=$student['id_hoc_sinh']?>">
                        <?=$student['ho']?>
                      </a>
                    </td>
                    <td><?=$student['ten']?></td>
                    <td><?=$student['ten_dang_nhap']?></td>
                    <td><?=$class['ten_lop']?></td>
                    
                  </tr>
                <?php } } ?>
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
    <?php if ($check == 0) {
        header("Location: students.php");
        exit;
    } ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
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
