<?php 
    session_start();
    include "db.php";

    $_SESSION['ID_entry'] = $_GET['ID_entry'];

    $data = [
        ":ID_user" => $_SESSION['ID_user'],
        ":ID_entry" => $_SESSION['ID_entry']
    ];
    $sql = "SELECT * FROM tri_posts WHERE ID_user = :ID_user AND ID_entry = :ID_entry";
    $sql_prov = $db->prepare($sql);
    $result = $sql_prov->execute($data);
    $fetched_array = $sql_prov->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Profile</title>
        <link rel="stylesheet" type="text/css" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/css/css.css">
    </head>
    <body>
        <header class="p-3 mb-3 border-bottom bg-light">
			<div class="container">
				<div class="d-flex justify-content-between">
					<a class="d-flex align-items-center mb-2 mb-lg-0 bg-primary text-light text-decoration-none border rounded p-2" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/main_page.php">Main page</a>
					<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="search.php" method="post">
						<input type="search"class="form-control" type="search" name="search" placeholder="Search all posts...">
					</form>
					<a class="d-flex align-items-center mb-2 mb-lg-0 bg-primary text-light text-decoration-none border rounded p-2" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/my_profile.php">My profile (user ID:<?php echo $_SESSION['ID_user']; ?>)
                    </a>
				</div>
			</div>
		</header>
        <div class="container"> 
            <div class='container border rounded py-2 my-2'>
				<form action="https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/edit_post_action.php" method="post">
					<div class="form-group mb-2">
						<label for="post_name">Headline</label>
						<input type="text" name="post_name" class="form-control" <?php echo "value='".$fetched_array[0]['post_name']."'" ?> placeholder="Enter headline">
					</div>
					<div class="form-group form-group-lg mb-2">
						<label for="post_name">Text</label>
						<input type="text" name="post_message" class="form-control" <?php echo "value='".$fetched_array[0]['post_message']."'" ?> placeholder="Enter text">
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
        </div>
    </body>
</html>