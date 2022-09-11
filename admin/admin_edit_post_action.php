<?php
	session_start();
	include "db.php";

	var_dump($_SESSION);
	var_dump($_POST);

	if (isset($_POST['post_name']) && isset($_POST['post_message']) && isset($_SESSION['ID_user'])) {
		$data = [
				//":ID_user" => $_SESSION['ID_user'],
				":ID_entry" => $_SESSION['ID_entry'],
				":post_name" => $_POST['post_name'],
				":post_message" => $_POST['post_message']
			];
		$sql = "UPDATE tri_posts SET post_name = :post_name, post_message = :post_message WHERE ID_entry = :ID_entry"; //ID_user = :ID_user;
		$sql_prov = $db->prepare($sql);
		$result = $sql_prov->execute($data);
		echo $result ? "ok" : "error";
		header("Location: https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/my_profile.php");
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