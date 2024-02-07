<?php
session_start();
include '../dataconnection.php';

// Get the form data
$model = $connect->real_escape_string($_POST['model']);
$plate_number = $connect->real_escape_string($_POST['plate_number']);
$color = $connect->real_escape_string($_POST['color']);
$capacity = $connect->real_escape_string($_POST['capacity']);

// Prepare and bind
$stmt = $connect->prepare("INSERT INTO cars (model, number_plate, colour, capacity) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $model, $plate_number, $color, $capacity);

// Execute the statement
if ($stmt->execute()) {
    echo "New car added successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$connect->close();
?>