<?php
session_start();

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Check if username and password are correct
	if ($username == 'myusername' && $password == 'mypassword') {
		// Set session variables
		$_SESSION['username'] = $username;
		$_SESSION['logged_in'] = true;

		// Redirect to member dashboard
		header('Location: dashboard.php');
		exit;
	} else {
		// Display error message
		$error = 'Invalid username or password';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>Welcome to My Dating Website</h1>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="#">Log In</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<h2>Member Login</h2>
			<form method="post">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password">
				<button type="submit" name="submit">Log In</button>
			</form>
			<?php if (isset($error)) { ?>
				<p><?php echo $error; ?></p>
			<?php } ?>
		</section>
	</main>
	<footer>
		<p>&copy; 2023 My Dating Website. All rights reserved.</p>
	</footer>
</body>
</html>
