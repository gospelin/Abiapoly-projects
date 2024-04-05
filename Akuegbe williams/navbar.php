<?php
    /*
        Name:   Akuegbe Williams
        Mat No: HD2022/07544/1/CS
    */
	$owner_name = " Akuegbe Williams. ";
?>

<header>
	<div class="containers">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sample.php">Sample</a></li>
                <li><a href="more.php">More</a></li>
                <li><a href="contact.php">Contact Me</a></li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
	</div>
</header>

