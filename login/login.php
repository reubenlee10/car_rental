<?php
session_start();
include '../dataconnection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database based on the provided email
    $query = "SELECT password FROM customer_credentials WHERE email = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashed_password);

    if (mysqli_stmt_fetch($stmt)) {
        // Check if the provided password matches the hashed password
        if (password_verify($password, $hashed_password)) {
            $cust_id = "";
            mysqli_stmt_close($stmt); // Close the first statement before preparing the second one

            $query2 = "SELECT customer_id FROM customer_credentials WHERE email = ?";
            $stmt2 = mysqli_prepare($connect, $query2);
            mysqli_stmt_bind_param($stmt2, "s", $email);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_bind_result($stmt2, $cust_id);

            $_SESSION["user_id"] = $cust_id;

            // Set session variables or perform any other actions needed upon successful login
            header("Location: ../reservations");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Email not found.";
    }

    // Close the first statement
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
?>
