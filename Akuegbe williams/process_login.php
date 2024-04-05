<?php
    /*
        Name:   Ohayi Chinyere
        Mat No: HD2022/07579/1/CS
    */

    // Set the custom database name
    $custom_dbname = "Akuegbe_Williams_DB"; // Change this to the desired custom database name

    // Include config.php to establish database connection
    include 'config.php';

    // Initialize variables
    $username = $password = '';
    $username_err = $password_err = '';

    // Check if the connection is successful
    if ($conn) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate username
            if (empty(trim($_POST["username"]))) {
                $username_err = "Please enter your username.";
            } else {
                $username = trim($_POST["username"]);
            }

            // Validate password
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password.";
            } else {
                $password = trim($_POST["password"]);
            }

            // Check input errors before proceeding
            if (empty($username_err) && empty($password_err)) {
                // Prepare a select statement
                $sql = "SELECT id, username, password FROM users WHERE username = ?";

                if ($stmt = $conn->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("s", $param_username);

                    // Set parameters
                    $param_username = $username;

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // Store result
                        $stmt->store_result();

                        // Check if username exists, if yes then verify password
                        if ($stmt->num_rows == 1) {
                            // Bind result variables
                            $stmt->bind_result($id, $username, $hashed_password);
                            if ($stmt->fetch()) {
                                if (password_verify($password, $hashed_password)) {
                                    // Password is correct, start a new session
                                    session_start();

                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["username"] = $username;

                                    // Redirect user to welcome page
                                    header("location: more.php");
                                } else {
                                    // Display an error message if password is not valid
                                    $password_err = "The password you entered is not valid.";
                                }
                            }
                        } else {
                            // Display an error message if username doesn't exist
                            $username_err = "No account found with that username.";
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    $stmt->close();
                }
            }
        }

        // Close connection
        $conn->close();
    } else {
        // Connection failed
        die("Connection failed: " . mysqli_connect_error());
    }

?>
