<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Rental System </title>
    <style>
      body {
        background-color: #3498db; /* Blue */
        font-family: "Arial", sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .login-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
      }

      h2 {
        color: #0057b7; /* Blue */
      }

      form {
        margin-top: 20px;
      }

      .input-group {
        margin-bottom: 15px;
        text-align: left;
      }

      label {
        display: block;
        margin-bottom: 5px;
        color: #0057b7; /* Blue */
      }

      .items {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin: 5px;
      }

      .signup-button {
        background-color: #ffd700; /* Yellow */
        color: #0057b7; /* Blue */
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      .signup-button:hover {
        background-color: #ffcc00; /* Darker Yellow */
      }
    </style>
  </head>
  <body>
    <div class="login-container">
      <h2>Car Rental System</h2>
      <div class="items">
        <a href="register">Register</a>
      </div>
      <div class="items">
        <a href="login">Login</a>
      </div>
      <div class="items">
        <a href="car">Add Car</a>
      </div>
      <div class="items">
        <a href="reservations">Make Reservation</a>
      </div>
    </div>
  </body>
</html>
