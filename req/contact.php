<?php  

if (isset($_POST['email']) &&
    isset($_POST['full_name']) &&
    isset($_POST['noi_dung'])) {

    include "../DB_connection.php";
	
	$email     = $_POST['email'];
	$full_name = $_POST['full_name'];
	$message   = $_POST['noi_dung'];

	if (empty($email)) {
		$em  = "Email is required";
		header("Location: ../index.php?error=$em#contact");
		exit;
	}else if (empty($full_name)) {
		$em  = "Full name is required";
		header("Location: ../index.php?error=$em#contact");
		exit;
	}else if (empty($message)) {
		$em  = "Massage is required";
		header("Location: ../index.php?error=$em#contact");
		exit;
	}else {
       $sql  = "INSERT INTO
                 message (ho_ten_nguoi_gui, sender_email, message)
                 VALUES(?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$full_name, $email, $message]);
        $sm = "Message sent successfully";
        header("Location: ../index.php?success=$sm#contact");
        exit;
	}

}else{
	header("Location: ../login.php");
	exit;
}