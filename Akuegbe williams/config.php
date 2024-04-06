<?php
    /*
        Name:   Akuegbe Williams
        Mat No: HD2022/07544/1/CS
    */

    $servername = "localhost"; // Change this if your database server is different
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password

    // Check if the custom database name variable is set
    if (isset($custom_dbname) && !empty($custom_dbname)) {
        $dbname = $custom_dbname;
    } else {
        $dbname = "mysqli"; // Change this to your default database name
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the custom database if it doesn't exist
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql_create_db) === TRUE) {
        // Select the custom database
        $conn->select_db($dbname);
    } else {
        echo "Error creating database: " . $conn->error;
    }

?>
