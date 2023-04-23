<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
	// Redirect to login page
	header('Location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member Dashboard</title>
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
			<h2>Member Dashboard</h2>
			<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
			<p>You are now logged in.</p>
		</section>
	</main>
	<footer>
		<p>&copy; 2023 My Dating Website. All rights reserved.</p>
	</footer>
</body>
</html>
