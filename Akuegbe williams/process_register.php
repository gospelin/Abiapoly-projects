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
        $table_name = "users";
        $sql_create_table = "CREATE TABLE IF NOT EXISTS $table_name (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL,
            password VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        // Define variables and initialize with empty values
        $username = $email = $password = $confirm_password = '';
        $username_err = $email_err = $password_err = $confirm_password_err = '';

    // Create the users table if it doesn't exist
    if ($conn->query($sql_create_table) === TRUE) {

        // Proceed with user registration
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate username
            if (empty(trim($_POST["username"]))) {
                $username_err = "Please enter a username.";
            } else {
                // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = ?";

                if ($stmt = $conn->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("s", $param_username);

                    // Set parameters
                    $param_username = trim($_POST["username"]);

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // Store result
                        $stmt->store_result();

                        if ($stmt->num_rows == 1) {
                            $username_err = "This username is already taken.";
                        } else {
                            $username = trim($_POST["username"]);
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $stmt->close();
                }
            }

            // Validate email
            if (empty(trim($_POST["email"]))) {
                $email_err = "Please enter an email address.";
            } else {
                $email = trim($_POST["email"]);
            }

            // Validate password
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter a password.";
            } elseif (strlen(trim($_POST["password"])) < 6) {
                $password_err = "Password must have at least 6 characters.";
            } else {
                $password = trim($_POST["password"]);
            }

            // If validation passes, insert user data into the database
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql_insert_user = "INSERT INTO $table_name (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn->query($sql_insert_user) === TRUE) {
                // Registration successful, redirect or display a success message
                header("location: welcome.php");
                exit();
            } else {
                // Error inserting user data
                echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
            }
        }
    } else {
        // Error creating table
        echo "Error creating table: " . $conn->error;
    }
    } else {
            // Error creating database
            echo "Error creating database: " . $conn->error;
        }

    // Close connection
        $conn->close();
    } else {
        // Connection failed
        die("Connection failed: " . mysqli_connect_error());
    }
?>
