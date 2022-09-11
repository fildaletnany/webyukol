<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>

	<link rel="stylesheet" type="text/css" href="https://zrostfi21.sps-prosek.cz/mysql/ukol/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body class="text-center h-100">
	<main class="w-100 p-4 d-flex justify-content-center pb-4">
		<form action="registration_action.php" method="post">
			<h1 class="h3 mb-3 fw-normal">Registration</h1>
			<div class="form-floating">
				<input class="form-control" id="floatingInput" type="email" name="user_mail" placeholder="your@mail.here">
				<label for="floatingInput">Your Email</label>
			</div>
			<div class="form-floating">
				<input class="form-control" id="floatingPassword" type="password" name="password" placeholder="Password5162">
				<label for="floatingPassword">Your Password</label>
			</div>
			<div class="form-floating mb-3">
				<input class="form-control" id="floatingPassword" type="password" name="password_verification" placeholder="Password5162">
				<label for="floatingPassword">Password verification</label>
			</div>
			<button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
			<a href="login.php">Log in</a>
		</form>
	</main>
</body>
</html>