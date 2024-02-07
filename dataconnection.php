<?php
$connect = mysqli_connect("localhost", "root", "", "car_rental");

if (!$connect) {
   die('Could not connect to database: ' . mysqli_connect_error());
} else {
  //echo "Successfully connected to the database.<br>";
}
?>
