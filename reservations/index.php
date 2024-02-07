<?php
session_start();
include '../dataconnection.php';

// SQL to get cars
$sql = "SELECT car_id, model, capacity FROM cars";
$result = $connect->query($sql);

$cars_options = "";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $cars_options .= "<option value='" . $row["car_id"] . "'>" . $row["model"] . " (".$row["capacity"]." seater) </option>";
    }
} else {
    $cars_options = "<option value=''>No cars available</option>";
}
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Rental System - Make a Reservation</title>
    <style>
      body {
        font-family: "Arial", sans-serif;
        background-color: #ffd700; /* Yellow background */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .reservation-form-container {
        width: 100%;
        max-width: 500px;
        padding: 2em;
        background-color: #fff; /* White background */
        border: 5px solid #0057b7; /* Blue border */
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }

      h2 {
        color: #0057b7; /* Blue text */
        text-align: center;
        margin-bottom: 1em;
      }

      .input-group {
        margin-bottom: 1em;
      }

      .input-group label {
        display: block;
        color: #0057b7; /* Blue text */
        margin-bottom: 0.5em;
      }

      .input-group input,
      .input-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #0057b7; /* Blue border */
        border-radius: 5px;
        font-size: 1em;
      }

      .reservation-button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #0057b7; /* Blue background */
        color: #fff; /* White text */
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .reservation-button:hover {
        background-color: #004cb7; /* Darker blue background */
      }

      /* Responsive adjustments */
      @media (max-width: 600px) {
        .reservation-form-container {
          width: 90%;
          padding: 1em;
        }

        .input-group label,
        .input-group input,
        .input-group select,
        .reservation-button {
          font-size: 0.9em;
        }
      }
    </style>
  </head>
  <body>
    <div class="reservation-form-container">
      <h2>Make a Car Reservation</h2>
      <form id="reservationForm" action="payment/index.php" method="get">
        <div class="input-group">
          <label for="customer_id">Customer ID:</label>
          <input type="number" id="customer_id" name="customer_id" required />
        </div>
        <div class="input-group">
          <label for="car_id">Select Car:</label>
          <select id="car_id" name="car_id" required>
            <?php 
              echo $cars_options;
            ?>
          </select>
        </div>
        <div class="input-group">
          <label for="date">Reservation Date:</label>
          <input type="date" id="date" name="date" required />
        </div>
        <div class="input-group">
          <label for="period">Rental Period (Days):</label>
          <input type="number" id="period" name="period" required />
        </div>
        <button type="submit" class="reservation-button">Reserve Now</button>
      </form>
    </div>
  </body>
</html>
