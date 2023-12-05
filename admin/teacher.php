<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/teacher.php";
       include "data/subject.php";
       include "data/class.php";
       $giao_vien = getAllTeachers($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Teachers</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($giao_vien != 0) {
     ?>
     <div class="container mt-5">
        <a href="teacher-add.php"
           class="btn btn-dark">Thêm Giáo Viên Mới</a>

           <form action="teacher-search.php" 
                 class="mt-3 n-table"
                 method="get">
             <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="searchKey"
                       placeholder="Tìm kiếm...">
                <button class="btn btn-primary">
                        <i class="fa fa-search" 
                           aria-hidden="true"></i>
                      </button>
             </div>
           </form>

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
                    <th scope="col">Họ và Tên Đệm</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tên Đăng Nhập</th>
                    <th scope="col">Môn Học</th>
                    <th scope="col">Lớp giảng dạy</th>
                    <th scope="col">Hành Động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($giao_vien as $teacher ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$teacher['id_giao_vien']?></td>
                    <td><a href="teacher-view.php?id_giao_vien=<?=$teacher['id_giao_vien']?>">
                         <?=$teacher['ho']?></a></td>
                    <td><?=$teacher['ten']?></td>
                    <td><?=$teacher['ten_dang_nhap']?></td>
                    <td>
                       <?php 
                           $s = '';
                           $mon_hoc = str_split(trim($teacher['mon_hoc']));
                           foreach ($mon_hoc as $subject) {
                              $s_temp = getSubjectById($subject, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['ten_mon_hoc'].', ';
                           }
                           echo $s;
                        ?>
                    </td>
                    <td>
                      <?php 
                           $c = '';
                           $classes = str_split(trim($teacher['danh_sach_lop']));

                           foreach ($classes as $id_lop) {
                               $class = getClassById($id_lop, $conn);


                              if ($class != 0) 
                                $c .=$class['ten_lop'].', ';
                           }
                           echo $c;

                        ?>
                    </td>
                    <td>
                        <a href="teacher-edit.php?id_giao_vien=<?=$teacher['id_giao_vien']?>"
                           class="btn btn-warning">Sửa</a>
                        <a href="teacher-delete.php?id_giao_vien=<?=$teacher['id_giao_vien']?>"
                           class="btn btn-danger">Xóa</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Trống!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
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

