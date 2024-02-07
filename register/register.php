<?php
    session_start();
    include '../dataconnection.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Retrieve user input
        // $full_name = $_POST['full_name'];
        $full_name = htmlspecialchars($_POST['full_name'], ENT_QUOTES,'UTF-8');
        // $email = $_POST['email'];
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'];
        $license_number = $_POST['license_number'];

        // Hash the password using the built-in password_hash function
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if the connection is successful
        if ($connect) {
            // Prepare and execute the SQL query to insert user details into the database
            $query = "INSERT INTO customer_credentials (full_name, email, password, phone_number, license_number) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $query);

            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, "sssss", $full_name, $email, $hashed_password, $phone_number, $license_number);
            $result = mysqli_stmt_execute($stmt);

            // Check if the query was successful
            if ($result) {
                echo "Registration successful!"; // You can customize this message
            } else {
                echo "Error: " . mysqli_error($connect);
            }

            // Close the statement and connection
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
        } else {
            echo "Error: Unable to connect to the database.";
        }
    }
?>