<?php
    /*
        Name:   Akuegbe Williams
        Mat No: HD2022/07544/1/CS
    */

    // Start session
    session_start();

    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }

    // Display username from session
    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akuegbe Williams - HD2022/07544/1/CS</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/more-style.css">
</head>
<body>
    <header>
        <div class="containers">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sample.php">Sample</a></li>
                    <li><a href="more.php">More</a></li>
                    <li><a href="contact.php">Contact Me</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php
        $owner_name = " Akuegbe Williams. ";

        // Display username from session
        $username = $_SESSION["username"];
    ?>
    <section class="content">
        <div class="container">
            <h1>Welcome, <?php echo $username; ?>!</h1>
            <div class="gallery">
                <div class="item">
                    <img src="./images/plex-tv-home-page.webp" alt="A blog">
                    <div class="description">
                        <h3>Project 1</h3>
                        <p>Plex Tv</p>
                    </div>
                </div>
                <div class="item">
                    <img src="./images/sqarespace.png" alt="Square space">
                    <div class="description">
                        <h3>Project 2</h3>
                        <p>Square Space Platform</p>
                    </div>
                </div>
                <div class="item">
                    <img src="./images/videograph-free-template.jpg" alt="A Videograph site">
                    <div class="description">
                        <h3>Project 3</h3>
                        <p>A Videograph project</p>
                    </div>
                </div>
                <div class="item">
                    <img src="./images/Zillow-Website-Design.webp" alt="Zillow Website">
                    <div class="description">
                        <h3>Project 4</h3>
                        <p>Zillow Website</p>
                    </div>
                </div>
                <!-- Add more items as needed -->
            </div>
        </div>
    </section>

    <footer>
        <div>
            <p>&copy; <?php echo date("Y"); ?>  <?php echo $owner_name; ?>   All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
