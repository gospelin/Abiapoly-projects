<?php
    /*
        Name:   Akuegbe Williams
        Mat No: HD2022/07544/1/CS
    */
    
    // Set the custom database name
    $custom_dbname = "Akuegbe_Williams_DB"; // Change this to the desired custom database name

    // Include config.php to establish database connection
    include 'config.php';

    // Check if the connection is successful
    if ($conn) {

        // Check if the custom database exists, create it if it doesn't
        $sql_check_db = "CREATE DATABASE IF NOT EXISTS $custom_dbname";
        if ($conn->query($sql_check_db) === TRUE) {
            // Select the custom database
            mysqli_select_db($conn, $custom_dbname);

        // Define table name and validation rules
        $table_name = "contact_form";
        $sql_create_table = "CREATE TABLE IF NOT EXISTS $table_name (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            message TEXT NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        // Define variables and initialize with empty values
        $name = $email = $phone = $message = "";
        $name_err = $email_err = $phone_err = $message_err = "";
    // Create the users table if it doesn't exist
    if ($conn->query($sql_create_table) === TRUE) {
    // Check if the form is submitted

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validate name
            if (empty(trim($_POST["name"]))) {
                $name_err = "Please enter your name.";
            } else {
                $name = trim($_POST["name"]);
            }

            // Validate email
            if (empty(trim($_POST["email"]))) {
                $email_err = "Please enter your email address.";
            } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                $email_err = "Invalid email format.";
            } else {
                $email = trim($_POST["email"]);
            }

            // Validate phone number
            if (empty(trim($_POST["phone"]))) {
                $phone_err = "Please enter your phone number.";
            } elseif (!preg_match("/^[0-9]{11}$/", trim($_POST["phone"]))) {
                $phone_err = "Invalid phone number format. Use XXX-XXX-XXXXX.";
            } else {
                $phone = trim($_POST["phone"]);
            }

            // Validate message
            if (empty(trim($_POST["message"]))) {
                $message_err = "Please enter your message.";
            } else {
                $message = trim($_POST["message"]);
            }

            // Check input errors before inserting into database
            if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($message_err)) {
                // Prepare an insert statement
                $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES (?, ?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("ssss", $param_name, $param_email, $param_phone, $param_message);

                    // Set parameters
                    $param_name = $name;
                    $param_email = $email;
                    $param_phone = $phone;
                    $param_message = $message;

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // Redirect to thank you page
                        header("location: thank_you.php");
                        exit();
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $stmt->close();
                }
            }
        }
        } else {
            // Error creating database
            echo "Error creating database: " . $conn->error;
        }
        } else {
            // Error creating table
            echo "Error creating table: " . $conn->error;
        }
    // Close connection
    $conn->close();

    }  else {
    // Connection failed
    die("Connection failed: " . mysqli_connect_error());
    }

?>
