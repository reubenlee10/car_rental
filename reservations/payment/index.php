<?php
session_start();
include '../../dataconnection.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Rental System - Payment</title>
    <style>
      body {
        font-family: "Arial", sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .payment-form-container {
        background-color: #fff;
        width: 100%;
        max-width: 500px;
        margin: 2em;
        padding: 2em;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      }

      .payment-form-header {
        background-color: #0057b7;
        color: #fff;
        padding: 1em;
        border-radius: 8px 8px 0 0;
        text-align: center;
        margin: -2em -2em 2em -2em;
      }

      h2 {
        margin: 0;
      }

      .input-group {
        margin-bottom: 1em;
      }

      .input-group label {
        display: block;
        margin-bottom: 0.5em;
        color: #333;
      }

      .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
      }

      .payment-button {
        width: 100%;
        padding: 10px;
        background-color: #ffd700; /* Yellow */
        color: #0057b7; /* Blue text */
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
        margin-top: 1em;
        transition: background-color 0.3s ease;
      }

      .payment-button:hover {
        background-color: #ffcc00; /* Darker yellow */
      }
    </style>
    <script>
      function formatExpiryDate(input) {
        var inputLength = input.value.length;
        var lastChar = input.value[inputLength - 1];
        if (/\D/g.test(lastChar)) {
          input.value = input.value.slice(0, -1);
          return;
        }
        if (inputLength === 2 && input.value.indexOf("/") === -1) {
          input.value += "/";
        }
        if (inputLength > 5) {
          input.value = input.value.slice(0, 5);
        }
      }

      function restrictNumericInput(input, length) {
        if (input.value.length > length) {
          input.value = input.value.slice(0, length);
        }
        input.value = input.value.replace(/\D/g, "");
      }
    </script>
  </head>
  <body>
    <div class="payment-form-container">
      <div class="payment-form-header">
        <h2>Payment Details</h2>
      </div>
      <form id="paymentForm" action="processPayment.php" method="post">
        <div class="input-group">
          <label for="cardholder_name">Cardholder's Name:</label>
          <input
            type="text"
            id="cardholder_name"
            name="cardholder_name"
            required
          />
        </div>
        <div class="input-group">
          <label for="card_number">Card Number:</label>
          <input
            type="text"
            id="card_number"
            name="card_number"
            required
            oninput="restrictNumericInput(this, 16)"
            maxlength="16"
            placeholder="Card Number"
          />
        </div>
        <div class="input-group">
          <label for="expiry_date">Expiry Date (MM/YY):</label>
          <input
            type="text"
            id="expiry_date"
            name="expiry_date"
            required
            oninput="formatExpiryDate(this)"
            placeholder="MM/YY"
            maxlength="5"
          />
        </div>
        <div class="input-group">
          <label for="ccv_number">CCV Number:</label>
          <input
            type="text"
            id="ccv_number"
            name="ccv_number"
            required
            oninput="restrictNumericInput(this, 3)"
            maxlength="3"
            placeholder="CCV"
          />
        </div>
         <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $_GET['customer_id'] ?>">
         <input type="hidden" id="car_id" name="car_id" value="<?php echo $_GET["car_id"] ?>">
         <input type="hidden" id="date" name="date" value="<?php echo $_GET["date"] ?>">
         <input type="hidden" id="period" name="period" value="<?php echo $_GET["period"] ?>">
        <button type="submit" class="payment-button">Proceed to Pay</button>
      </form>
    </div>
  </body>
</html>
