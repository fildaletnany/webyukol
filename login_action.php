<?php
	include "db.php";

	session_start();

	if (isset($_POST['user_mail'])) {
		$user_mail = $_POST['user_mail'];
	}
	else{
		echo "email nebyl vyplnen";
	}
	function hashpassword($password_verified){
		$phase1 = hash("sha256", $password_verified);
		$phase2 = hash("sha1", $phase1);
		$phase3 = $phase1.$phase2;
		return $phase3;
	}

	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		$hashedpassword = hashpassword($password);
	}
	else{
		echo "heslo nebylo vyplneno";
	}

	$data = [
		":user_mail" => $user_mail,
		":password" => $hashedpassword
	];

	$sql_command = "SELECT * FROM tri WHERE user_mail = :user_mail AND password = :password";
	$mail_check_sql = $db->prepare($sql_command);
	$mail_check_sql->execute($data);
	$fetched_email = $mail_check_sql->fetchAll(PDO::FETCH_ASSOC);

	var_dump($fetched_email);

	if ($fetched_email != null) {
		$_SESSION['ID_user'] = $fetched_email[0]['ID_user'];
		echo "ok";
		echo "<br>";
		echo $_SESSION['ID_user'];
		echo "<br>";
		header("Location: main_page.php");
		//echo "<a href='main_page.php'>pokracovat</a>";
	}
	else{
		echo "takovy ucet neexistuje";
	}
?>