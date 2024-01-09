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
   if ($grade >= 46) {
    $g = "A+";
    } else if ($grade >= 43) {
        $g = "A";
    } else if ($grade >= 40) {
        $g = "A-";
    } else if ($grade >= 37.5) {
        $g = "B+";
    } else if ($grade >= 35) {
        $g = "B";
    } else if ($grade >= 33) {
        $g = "B-";
    } else if ($grade >= 30) {
        $g = "C";
    } else if ($grade >= 27.5) {
        $g = "C-";
    } else if ($grade >= 25) {
        $g = "D+";
    } else if ($grade >= 22.5) {
        $g = "D";
    } else if ($grade >= 20) {
        $g = "D-";
    } else {
        $g = "F";
    }
   return $g;
}

function calculateAverage($ket_qua)
{
    $total = 0;
    $count = 0;
    foreach ($ket_qua as $result) {
        $temp = explode(' ', trim($result));
        // if (isset($temp[0]) && isset($temp[1])) {
            $total += $temp[0];
            $count++;
            // echo $total,$count;

        // }
    }
    // echo $total,$count;
    $diem_trung_binh = $total /$count;
    // echo $diem_trung_binh;
    return $count > 0 ? number_format($total / $count, 2) : 0;
}