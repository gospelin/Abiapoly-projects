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
	<link rel="stylesheet" href="./css/sample-style.css">
</head>
<body>
    <?php include_once 'navbar.php'; ?>

    <section class="content">
        <div class="container">

            <!-- Slideshow container -->
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="./images/globex_it_solutions_multi_services.jpg" style="width:100%">
                    <div class="text">Project 1</div>
                </div>

                <div class="mySlides fade">
                    <img src="./images/images2.jpeg" style="width:100%">
                    <div class="text">Project 2</div>
                </div>

				<div class="mySlides fade">
                    <img src="./images/images4.jpeg" style="width:100%">
                    <div class="text">Project 3</div>
                </div>

				<div class="mySlides fade">
                    <img src="./images/images6.jpeg" style="width:100%">
                    <div class="text">Project 4</div>
                </div>

                <!-- Add more slides as needed -->

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
    </section>

    <footer>
        <div>
            <p>&copy; <?php echo date("Y"); ?>  <?php echo $owner_name; ?>   All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex-1].style.display = "block";
        }
    </script>
</body>
</html>
