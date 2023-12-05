<?php  

// All Students 
function getAllMessages($conn){
   $sql = "SELECT * FROM thong_bao ORDER BY id_thong_bao DESC";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   if ($stmt->rowCount() >= 1) {
     $messages = $stmt->fetchAll();
     return $messages;
   }else {
    return 0;
   }
}