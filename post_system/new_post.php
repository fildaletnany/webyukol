<?php 
    session_start();
    include "db.php";
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
					<a class="d-flex align-items-center mb-2 mb-lg-0 bg-primary text-light text-decoration-none border rounded p-2" href="post_system/my_profile.php">My profile (user ID:<?php echo $_SESSION['ID_user']; ?>)
                    </a>
				</div>
			</div>
		</header>
        <div class="container"> 
            <div class='container border rounded py-2 my-2'>
				<form action="https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/new_post_action.php" method="post">
					<div class="form-group mb-2">
						<label for="post_name">Headline</label>
						<input type="text" name="post_name" class="form-control " placeholder="Enter headline">
					</div>
					<div class="form-group mb-2">
						<label for="post_name">Text</label>
						<input type="text" name="post_message" class="form-control " placeholder="Enter text">
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</div>
				</form>
			</div>
        </div>
    </body>
</html>
<!--<form action="new_post_action.php" method="post">
			<label for="post_name">Headline</label>
			<input type="text" name="post_name">
			<br>
			<label for="post_message">Text</label>
			<input type="text" name="post_message">
			<br>
			<label for="post_theme">Theme</label>
			<input type="text" name="post_theme">
			<p>*separate each theme by a coma, for example: "IT, computers, webdesign".</p>
			<br>
			<input type="submit" value="Submit">
		</form>-->
