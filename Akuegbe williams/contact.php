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
    <link rel="stylesheet" href="./css/contact-style.css">

</head>

<body>
    <?php
    include_once 'navbar.php';
    ?>
    <div class="container">
        <h2>Contact</h2>
        <form action="process_contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Send Message">
        </form>
    </div>
    <footer>
        <div>
            <p>&copy; <?php echo date("Y"); ?> <?php echo $owner_name; ?> All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>