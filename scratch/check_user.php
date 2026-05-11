<?php
require_once 'database/DB.php';

$email = 'guest@hcmut.edu.vn';
$password = 'Thinh@123';

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo "User found:\n";
    print_r($user);
    
    if (password_verify($password, $user['password'])) {
        echo "Password verification: SUCCESS\n";
    } else {
        echo "Password verification: FAILED\n";
        echo "Input password: $password\n";
        echo "Hashed password in DB: " . $user['password'] . "\n";
    }
} else {
    echo "User NOT found: $email\n";
}
?>
