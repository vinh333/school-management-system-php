<?php
session_start();
if (isset($_SESSION['id_giao_vien']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
        include "../DB_connection.php";
        include "data/student.php";
        include "data/class.php";

        include "data/setting.php";
        include "data/subject.php";
        include "data/teacher.php";
        include "data/student_score.php";

        if (!isset($_GET['id_hoc_sinh'])) {
            header("Location: students.php");
            exit;
        }
        $id_hoc_sinh = $_GET['id_hoc_sinh'];
        $student = getStudentById($id_hoc_sinh, $conn);
        $setting = getSetting($conn);
        $mon_hoc = getSubjectByClass($student['id_lop'], $conn);

        $id_giao_vien = $_SESSION['id_giao_vien'];
        $teacher = getTeacherById($id_giao_vien, $conn);

        $teacher_subjects = str_split(trim($teacher['mon_hoc']));

        $sid_mon_hoc = 0;
        if (isset($_POST['sid_mon_hoc'])) {
            $sid_mon_hoc = $_POST['sid_mon_hoc'];
            $diem_hoc_sinh = getScoreById($id_hoc_sinh, $id_giao_vien, $sid_mon_hoc, $setting['hoc_ky'], $setting['nam_hoc'], $conn);
        }
        ?>
        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Giáo viên - Điểm học sinh</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../logo.png">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>
            <?php
            include "inc/navbar.php";
            if ($student != 0 && $setting != 0 && $mon_hoc != 0 && $teacher_subjects != 0) {
            ?>

                <div class="d-flex align-items-center flex-column"><br><br>
                    <div class="login shadow p-3">
                        <form method="post" action="">
                            <div class="mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item"><b>ID: </b> <?php echo $student['id_hoc_sinh'] ?></li>
                                    <li class="list-group-item"><b>Họ và tên đệm: </b> <?php echo $student['ho'] ?></li>
                                    <li class="list-group-item"><b>Tên: </b> <?php echo $student['ten'] ?></li>
                                    <li class="list-group-item text-center"><b>Năm: </b> <?php echo $setting['hoc_ky']; ?> &nbsp;&nbsp;&nbsp;<b>Học kỳ</b> <?php echo $setting['nam_hoc']; ?></li>
                                </ul>
                            </div>
                            <h5 class="text-center">Thêm điểm</h5>
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['error'] ?>
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_GET['success'] ?>
                                </div>
                            <?php } ?>

                            <label class="form-label">Môn học</label>
                            <select class="form-control" name="sid_mon_hoc">
                                <?php foreach ($mon_hoc as $subject) {
                                    foreach ($teacher_subjects as $teacher_subject) {
                                        if ($subject['id_mon_hoc'] == $teacher_subject) { ?>
                                            <option <?php if ($sid_mon_hoc == $subject['id_mon_hoc']) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $subject['id_mon_hoc'] ?>">
                                                <?php echo $subject['ten_mon_hoc'] ?></option>
                                <?php }
                                    }
                                } ?>
                            </select><br>

                            <button type="submit" class="btn btn-primary">Chọn</button><br><br>
                        </form>
                        <form method="post" action="req/save-score.php">
                            <?php

                            if ($sid_mon_hoc != 0) {
                                $counter = 0;
                                if ($diem_hoc_sinh != 0) { ?>
                                    <input type="text" name="diem_hoc_sinh_id" value="<?= $diem_hoc_sinh['id_diem'] ?>" hidden>
                                <?php
                                    $scores = explode(',', trim($diem_hoc_sinh['ket_qua']));

                                    foreach ($scores as $score) {
                                        $temp =  explode(' ', trim($score));
                                        $counter++;
                                ?>

                                        <div class="input-group mb-3">
                                            <input type="number" min="0" max="10" class="form-control" value="<?= $temp[0] ?>" name="score-<?php echo $counter; ?>">
                                        </div>
                            <?php }
                                }
                                if ($counter <  5) {
                                    for ($i = ++$counter; $i <= 5; $i++) {
                            ?>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="xx" name="score-<?php echo $i; ?>">
                                        </div>
                            <?php }
                                } ?>

                                <input type="text" name="id_hoc_sinh" value="<?= $id_hoc_sinh ?>" hidden>
                                <input type="text" name="id_mon_hoc" value="<?= $sid_mon_hoc ?>" hidden>
                                <input type="text" name="hoc_ky" value="<?= $setting['nam_hoc'] ?>" hidden>
                                <input type="text" name="nam_hoc" value="<?= $setting['hoc_ky'] ?>" hidden>

                                <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
            <?php } ?>
                    </div>
                </div>
    <?php
            } else {
                header("Location: students.php");
                exit;
            }
        ?>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    $(document).ready(function() {
                        var currentPath = window.location.pathname;
                        if (currentPath.includes("student")) {
                            $("#navLinks li:nth-child(4) a").addClass('active');
                        }
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
