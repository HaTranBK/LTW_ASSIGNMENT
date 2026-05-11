<?php
require_once 'database/DB.php';

$name = 'Guest User';
$email = 'guest@hcmut.edu.vn';
$phone = '0123456789';
$address = 'HCMUT';
$password = 'Thinh@123';
$hashPassword = password_hash($password, PASSWORD_DEFAULT);
$verifyCode = '';
$active = 1;

// Check if user already exists
$checkSql = "SELECT email FROM user WHERE email = '$email'";
$result = $conn->query($checkSql);

if ($result->num_rows > 0) {
    echo "User already exists. Updating password...\n";
    $updateSql = "UPDATE user SET password = '$hashPassword', active = $active WHERE email = '$email'";
    if ($conn->query($updateSql) === TRUE) {
        echo "User updated successfully.\n";
    } else {
        echo "Error updating user: " . $conn->error . "\n";
    }
} else {
    echo "Creating user...\n";
    $insertSql = "INSERT INTO user (name, email, phone, address, password, verify_code, active) 
                  VALUES ('$name', '$email', '$phone', '$address', '$hashPassword', '$verifyCode', $active)";
    if ($conn->query($insertSql) === TRUE) {
        echo "User created successfully.\n";
    } else {
        echo "Error creating user: " . $conn->error . "\n";
    }
}
?>
