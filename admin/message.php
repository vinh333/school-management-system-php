<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/message.php";
       $messages = getAllMessages($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Tin Nhắn</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($messages != 0) {
     ?>
     <div class="container mt-5" style="width: 90%; max-width: 700px;">
        <h4 class="text-center p-3">Hộp Thư</h4>
        <div class="accordion accordion-flush" id="accordionFlushExample_<?=$message['id_thong_bao']?>">
          <?php foreach ($messages as $message) { ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading_<?=$message['id_thong_bao']?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_<?=$message['id_thong_bao']?>" aria-expanded="false" aria-controls="flush-collapse_<?=$message['id_thong_bao']?>">
                <?=$message['ho_ten_nguoi_gui']?> 
              </button>
            </h2>
            <div id="flush-collapse_<?=$message['id_thong_bao']?>" class="accordion-collapse collapse" aria-labelledby="flush-heading_<?=$message['id_thong_bao']?>" data-bs-parent="#accordionFlushExample_<?=$message['id_thong_bao']?>">
              <div class="accordion-body">
                <?=$message['noi_dung']?>
                <div class="d-flex mb-3">
                    <div class="p-2">Email: <b><?=$message['email_nguoi_gui']?></b></div>
                    <div class="ms-auto p-2">Ngày: <?=$message['thoi_gian_gui']?></div>
                </div>
            </div>
            </div>
          </div>
          <?php } ?>
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
             $("#navLinks li:nth-child(7) a").addClass('active');
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
