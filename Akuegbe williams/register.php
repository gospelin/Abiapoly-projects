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
    <link rel="stylesheet" href="./css/register-style.css">
</head>
<body>
    <?php
		include_once 'navbar.php';
	?>
    <div class="container">
        <h1>Register</h1>
        <?php

            // Display error message if set
            if (isset($username_err) && !empty($username_err)) {
                echo '<div class="error-msg">' . $username_err . '</div>';
            }
            if (isset($email_err) && !empty($email_err)) {
                echo '<div class="error-msg">' . $email_err . '</div>';
            }
            if (isset($password_err) && !empty($password_err)) {
                echo '<div class="error-msg">' . $password_err . '</div>';
            }
            if (isset($confirm_password_err) && !empty($confirm_password_err)) {
                echo '<div class="error-msg">' . $confirm_password_err . '</div>';
            }
            // Display success message if set
            if (isset($success_message) && !empty($success_message)) {
                echo '<div class="success-msg">' . $success_message . '</div>';
            }
        ?>
        <form action="process_register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.php" id="login">Login here</a>.</p>
    </div>
    <footer>
        <div>
            <p>&copy; <?php echo date("Y"); ?>  <?php echo $owner_name; ?>   All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
