<?php
/*
        Name:   Akuegbe Williams
        Mat No: HD2022/07544/1/CS
    */
$owner_name = " Akuegbe Williams. ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akuegbe Williams - HD2022/07544/1/CS</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index-style.css">
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sample.php">Sample</a></li>
                    <li><a href="more.php">More</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section id="home" class="hero">
        <div class="container">
            <div class="content">
                <div class="intro">
                    <h1>Hello, I'm Akuegbe Williams</h1>
                    <p> A Front-End Web Developer with expertise in developing robust and scalable applications.
                        With over 2 years of experience, using HTML, CSS, and JavaScript.
                    </p>
                    <a href="contact.php" class="btn">Contact Me</a>
                </div>
                <div class="profile-pic">
                    <img src="./images/williams.jpg" alt="Your Name">
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div>
            <p>&copy; <?php echo date("Y"); ?> <?php echo $owner_name; ?> All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>