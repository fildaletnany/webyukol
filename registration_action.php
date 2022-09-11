<?php
	include "db.php";

	echo "<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<title>registration</title>
			</head>
			<body>";

	if (isset($_POST['user_mail'])) {
		if (filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL)) {
			$user_mail = $_POST['user_mail'];
		}
		else{
			$user_mail = null;
		}
	}
	
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
	}
	else{
		echo "vypln heslo kokote";
	}
	if (isset($_POST['password_verification'])) {
		$password_verification = $_POST['password_verification'];
	}
	else{
		echo "vypln heslo znova kokote";
	}

	function hashpassword($password_verified){
		$phase1 = hash("sha256", $password_verified);
		$phase2 = hash("sha1", $phase1);
		$phase3 = $phase1.$phase2;
		return $phase3;
	}
	if ($password == $password_verification) {
		$password_verified = $password;

		$hashedpassword =  hashpassword($password_verified);

		if ($user_mail != null) {
			$data = [
				":ID_user" => null, 
				":user_mail" => $user_mail,
				":password" => $hashedpassword,
				":rights" => 1
			];
			$mailchkc_data = [
				":user_mail" => $user_mail
			];

			var_dump($mailchkc_data);

			$sql_command = "SELECT * FROM tri WHERE user_mail = :user_mail";
			$mail_check_sql = $db->prepare($sql_command);
			$mail_check_sql->execute($mailchkc_data);
			$fetched_email = $mail_check_sql->fetchAll(PDO::FETCH_ASSOC);

			var_dump($fetched_email);

			if ($fetched_email == null) {
				$sql = "INSERT INTO tri (ID_user, user_mail, password, rights) VALUES (:ID_user, :user_mail, :password, :rights)";
				$sql_prov = $db->prepare($sql);
				$result = $sql_prov->execute($data);
				echo "<br>";
				echo $result ? "ok" : "error";
				echo $db->LastInsertId();
				echo "<a href='login.php'>pokracovat</a>";
			}
			else{
				echo "<br>";
				echo "ucet s timto emailem jiz existuje :(((((";
				echo "<a href='registration.php'>pokracovat</a>";
			}
		}
		if ($user_mail == null) {
			echo "nespravny email :(((((((";
			echo "<a href='registration.php'>pokracovat</a>";
		}
	}
	else{
		echo "hesla se nesmi lisit :((((((((((";
		echo "<a href='registration.php'>pokracovat</a>";
	}

	echo "</body>
		</html>";
?>
