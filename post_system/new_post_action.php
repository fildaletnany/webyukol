<?php
	session_start();
	include "db.php";

	var_dump($_SESSION);
	var_dump($_POST);

	if (isset($_POST['post_name']) && isset($_POST['post_message']) && isset($_SESSION['ID_user'])) {
		$data = [
				":ID_user" => $_SESSION['ID_user'], 
				":post_name" => $_POST['post_name'],
				":post_message" => $_POST['post_message'],
				":post_rating" => 0
			];
		$sql = "INSERT INTO tri_posts (ID_user, post_name, post_message, post_rating) VALUES (:ID_user, :post_name, :post_message, :post_rating)";
		$sql_prov = $db->prepare($sql);
		$result = $sql_prov->execute($data);
		echo $result ? "ok" : "error";
		echo $db->LastInsertId();
		header("Location: https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/success.php");
	}
	else if ($_SESSION['ID_user'] == null) {
		header("Location: https://zrostfi21.sps-prosek.cz/mysql/ukol/login.php");
	}
	else if ($_POST['post_name'] == null OR $_POST['post_message'] == null ) {
		echo "neco je spatne budes presmerovan za tri vteriny";
		sleep(3);
		header("Location: https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/new_post.php");
	}


?>