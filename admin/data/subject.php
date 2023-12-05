<?php 

// All Subjects
function getAllSubjects($conn){
   $sql = "SELECT * FROM mon_hoc";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $mon_hoc = $stmt->fetchAll();
     return $mon_hoc;
   }else {
   	return 0;
   }
}

// Get Subjects by ID
function getSubjectById($id_mon_hoc, $conn){
   $sql = "SELECT * FROM mon_hoc
           WHERE id_mon_hoc=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_mon_hoc]);

   if ($stmt->rowCount() == 1) {
     $subject = $stmt->fetch();
     return $subject;
   }else {
   	return 0;
   }
}


// DELETE course
function removeCourse($id, $conn){
   $sql  = "DELETE FROM mon_hoc
           WHERE id_mon_hoc=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}

 ?>