<?php
session_start();
if (isset($_SESSION['id_hoc_sinh']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
        include "../DB_connection.php";
        include "data/score.php";
        include "data/subject.php";

        $id_hoc_sinh = $_SESSION['id_hoc_sinh'];

        $scores = getScoreById($id_hoc_sinh, $conn);

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Học Sinh - Tổng Kết Điểm</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../logo.png">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body>
        <?php
        include "inc/navbar.php";
        if ($scores != 0) {
            ?>
            <div class="d-flex justify-content-center align-items-center flex-column pt-4">
                <?php
                $check = 0;
                foreach ($scores as $score) {
                    if ($score['nam_hoc'] == $check) {
                        $check = $score['nam_hoc'];
                        $csubject = getSubjectById($score['id_mon_hoc'], $conn);
                        ?>
                        <tr>
                            <td><?= $csubject['ten_mon_hoc'] ?></th>
                            <td><?= $csubject['ma_mon_hoc'] ?></th>
                            <td>
                                <?php
                                $total = 0;
                                $outOf = 0;
                                $ket_qua = explode(',', trim($score['ket_qua']));
                                foreach ($ket_qua as $result) {

                                    $temp = explode(' ', trim($result));
                                    $total += $temp[0];
                                    ?>
                                    <small class="border p-1">
                                        <?= $temp[0] ?> 
                                    </small>&nbsp;
                                <?php } ?>
                            </td>
                            <th><?= $total ?> / <?= 50 ?></th>
                            <th><?= calculateAverage($ket_qua) ?></th>

                            <th><?php
                                echo gradeCalc($total);
                                ?></th>
                            <th><?= $score['hoc_ky'] ?></th>
                        </tr>
                    <?php } else {
                        $check = $score['nam_hoc'];

                        $csubject = getSubjectById($score['id_mon_hoc'], $conn);
                        ?>
                        <div class="table-responsive " style="width: 90%; max-width: 800px;">
                            <table class="table table-bordered mt-1 mb-5 n-table">
                                <caption style="caption-side:top">Năm - <?= $score['nam_hoc'] ?> </caption>
                                <thead>
                                <tr>
                                    <th scope="col">Mã Môn Học</th>
                                    <th scope="col">Tên Môn Học</th>
                                    <th scope="col">Kết Quả</th>
                                    <th scope="col">Tổng</th>
                                    <th scope="col">Điểm Trung Bình</th>
                                    <th scope="col">Xếp Loại</th>
                                    <th scope="col">Học Kỳ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td><?= $csubject['ma_mon_hoc'] ?></th>
                                    <td><?= $csubject['ten_mon_hoc'] ?></th>
                                    <td>
                                        <?php
                                        $total = 0;
                                        $outOf = 0;
                                        $ket_qua = explode(',', trim($score['ket_qua']));
                                        foreach ($ket_qua as $result) {
                                            $temp = explode(' ', trim($result));
                                            $total += $temp[0];
                                            ?>
                                            <small class="border p-1">
                                                <?= $temp[0] ?>
                                            </small>&nbsp;
                                        <?php } ?>
                                    </td>
                                    <th><?= $total ?> / <?= 50 ?></th>
                                    <th><?= calculateAverage($ket_qua) ?></th>

                                    <th><?php
                                        echo gradeCalc($total);
                                        ?></th>
                                    <th><?= $score['hoc_ky'] ?></th>
                                </tr>
                                <?php } if ($score['nam_hoc'] != $check) { ?>
                                </tbody>
                            </table>
                        </div><br />
                    <?php } } ?>

                    <?php } else { ?>
                        <div class="alert alert-info .w-450 m-5"
                             role="alert">
                            Trống!
                        </div>
                    <?php } ?>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $("#navLinks li:nth-child(2) a").addClass('active');
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