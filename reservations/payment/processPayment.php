<?php
session_start();
include '../../dataconnection.php';

// Function to encrypt data
function encryptData($data, $encryption_key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

$encryption_key = 'jiibOPse3A+CV6rdId9biYRBkHOa/LB9uDpPv4GI8tUlBBpos+VpwPRBTtn6prUh'; 

// Get and encrypt the form data
$cardholder_name = encryptData($_POST['cardholder_name'], $encryption_key);
$card_number = encryptData($_POST['card_number'], $encryption_key);
$expiry_date = encryptData($_POST['expiry_date'], $encryption_key);
$ccv_number = encryptData($_POST['ccv_number'], $encryption_key);

// SQL to insert reservation
$stmt = "INSERT INTO reservation (customer_id, car_id, date, period) VALUES ( " . $_POST['customer_id'] .", ".$_POST['car_id'].", '" . $_POST['date'] . "', ".$_POST['period'].")";
$connect->query($stmt);

$res_id = $connect->insert_id;

// SQL to insert data (Modify the table and column names as per your database schema)
$sql = "INSERT INTO payment_method (customer_id, reservation_id, cardholder_name, card_number, expiry_date, ccv_number) VALUES (?, ?, ?, ?, ?, ?)";
$stmt2 = $connect->prepare($sql);
$stmt2 ->bind_param('ssssss',$_POST['customer_id'], $res_id, $cardholder_name, $card_number, $expiry_date, $ccv_number);

// Execute and check for success
if ($stmt2->execute()) {
    echo "Payment processed successfully";
} else {
    echo "Error: " . $stmt2->error;
}

$stmt2->close();
$connect->close();
?>