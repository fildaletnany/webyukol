<?php
	session_start();
	include "db.php";

	$_SESSION['sesh_result_count'] = 0;
	$result_count = 0;

	if (isset($_POST['search'])) {
		if ($_SESSION['ID_user'] == null) {
		header("Location: login.php");
		}
	    $sql = "SELECT * FROM tri_posts WHERE(post_name LIKE '%".$_POST['search']."%' OR post_message LIKE '%".$_POST['search']."%')";
	    $sql_prov = $db->prepare($sql);
	    $result = $sql_prov->execute();
	    $fetched_array = $sql_prov->fetchAll(PDO::FETCH_ASSOC);
	}
	else{
		echo "fahahahahahak !!!!!!!!";
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search</title>

		<!-- pro css vyuzit bootstrap-->
		<link rel="stylesheet" type="text/css" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/css/css.css">
	</head>
	<body>
		<header class="p-3 mb-3 border-bottom bg-light">
			<div class="container">
				<div class="d-flex justify-content-between">
					<a class="d-flex align-items-center mb-2 mb-lg-0 bg-primary text-light text-decoration-none border rounded p-2" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/main_page.php">Main page</a>
					<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="search_my_profile.php" method="post">
						<input type="search"class="form-control" type="search" name="search" placeholder="Search something else...">
					</form>
					<a class="d-flex align-items-center mb-2 mb-lg-0 bg-primary text-light text-decoration-none border rounded p-2" href="my_profile.php">My profile (user ID:<?php echo $_SESSION['ID_user']; ?>)
                    </a>
				</div>
			</div>
		</header>
		<div class="container">	
			<?php
				echo "<div class='container'><p>Searched term: '".$_POST['search']."'</p></div>";
				foreach ($fetched_array as $value) {
					if ($value['ID_user'] == $_SESSION['ID_user']) {
						$result_count = $result_count + 1;
						$_SESSION['sesh_result_count'] = $result_count;
						$pos_name = strpos($value['post_name'], $_POST['search']);
						if ($pos_name != null) {
							$post_name_highlighted = str_replace($_POST['search'], "<mark>".$_POST['search']."</mark>", $value['post_name']);
						}
						else{
							$post_name_highlighted = $value['post_name'];
						}
						$pos_message = strpos($value['post_message'], $_POST['search']);
						if ($pos_message != null) {
							$post_message_highlighted = str_replace($_POST['search'], "<mark>".$_POST['search']."</mark>", $value['post_message']);
						}
						else{
							$post_message_highlighted = $value['post_message'];
						}
						echo "<div class='container border rounded py-2 my-2'><div class='content-cell-headline d-flex justify-content-between'<p class='d-flex align-items-center font-weight-bold'><strong>".$post_name_highlighted."</strong></p><p class='d-flex align-items-center font-weight-bold'>posted by ID_user".$value['ID_user']."</p></div><div class='content-cell-body'><p>".$post_message_highlighted."</p></div><div class='content-cell-body d-flex justify-content-between'><p class='text-secondary'>Created: ".$value[('date')]."</p><a href='https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/edit_post.php/?ID_entry=".$value['ID_entry']."'>Edit</a></div></div>";
					}
				}
			?>
		</div>
	</body>
</html>