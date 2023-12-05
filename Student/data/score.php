<?php

// Get diem_hoc_sinh by ID
function getScoreById($id_hoc_sinh, $conn){
   $sql = "SELECT * FROM diem_hoc_sinh
           WHERE id_hoc_sinh=? ORDER BY nam_hoc DESC";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_hoc_sinh]);

   if ($stmt->rowCount() > 0) {
     $diem_hoc_sinhs = $stmt->fetchAll();
     return $diem_hoc_sinhs;
   }else {
    return 0;
   }
}

function gradeCalc($grade){
   $g = "";
   if ($grade >= 92) {
       $g = "A+";
   }else if ($grade >= 86) {
       $g = "A";
   }else if ($grade >= 80) {
       $g = "A-";
   }else if ($grade >= 75) {
       $g = "B+";
   }else if ($grade >= 70) {
       $g = "B";
   }else if ($grade >= 66) {
       $g = "B-";
   }else if ($grade >= 60) {
       $g = "C";
   }else if ($grade >= 55) {
       $g = "C-";
   }else if ($grade >= 50) {
       $g = "D+";
   }else if ($grade >= 45) {
       $g = "D";
   }else if ($grade >= 40) {
       $g = "D-";
   }else if ($grade < 39) {
       $g = "F";
   }
   return $g;
}