<?php
	session_start();
	include "db.php";

	if ($_SESSION['ID_user'] == null) {
		header("Location: login.php");
	}
    $sql = "SELECT * FROM tri_posts";
    $sql_prov = $db->prepare($sql);
    $result = $sql_prov->execute();
    $fetched_array = $sql_prov->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Main page</title>

		<!-- pro css vyuzit bootstrap-->
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/css.css">
	</head>
	<body>
		<header class="p-3 mb-3 border-bottom bg-light">
			<div class="container">
				<div class="d-flex justify-content-between">
					<a class="d-flex align-items-center mb-2 mb-lg-0 bg-light text-decoration-none border rounded p-2" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/main_page.php">Main page</a>
					<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="search.php" method="post">
						<input type="search"class="form-control" type="search" name="search" placeholder="Search all posts...">
					</form>
					<a class="d-flex align-items-center mb-2 mb-lg-0 bg-primary text-light text-decoration-none border rounded p-2" href="post_system/my_profile.php">My profile (user ID:<?php echo $_SESSION['ID_user']; ?>)
                    </a>
				</div>
			</div>
		</header>
		<div class="container">	
			<?php
				foreach ($fetched_array as $value) {
					echo "<div class='container border rounded py-2 my-2'>
							<div class='content-cell-headline d-flex justify-content-between'>
								<p class='d-flex align-items-center font-weight-bold'><strong>".$value['post_name']."</strong></p>
								<p class='d-flex align-items-center font-weight-bold'>posted by ID_user".$value['ID_user']."</p>
							</div>
							<div class='content-cell-body'>
								<p>".$value['post_message']."</p>
							</div>
							<div class='content-cell-body d-flex justify-content-between'>
                                <p class='text-secondary'>Created: ".$value[('date')]."</p>
                            </div>
						</div>";
				}
			?>
		</div>
	</body>
</html>

<?php
/*	$time_at_login = time();
	if (time()-$time_at_login > 3600 ) {
		session_destroy();
	}*/
?>