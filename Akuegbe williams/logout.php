<?php
    /*
        Name:   Akuegbe Williams
        Mat No: HD2022/07544/1/CS
    */

	// Initialize the session
	session_start();

	// Unset all of the session variables
	$_SESSION = array();

	// Destroy the session
	session_destroy();

	// Redirect to login page
	header('Location: login.php');
	exit();
?>

