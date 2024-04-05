<?php
    /*
        Name:   Akuegbe Williams
        Mat No: HD2022/07544/1/CS
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akuegbe Williams - HD2022/07544/1/CS</title>
	<link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login-style.css">
</head>
<body>
	<?php
		include_once 'navbar.php';
	?>
    <div class="container">
        <h1>Login</h1>
        <form action="process_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
		<p>Don't have an account? <a href="register.php" id="register">Register here</a>.</p>
    </div>
	<footer>
        <div>
            <p>&copy; <?php echo date("Y"); ?>  <?php echo $owner_name; ?>   All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
