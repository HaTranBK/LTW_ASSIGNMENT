<?php
require_once 'database/DB.php';

$sql = "SELECT user_id, name, email, active FROM user LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Users in DB:\n";
    while($row = $result->fetch_assoc()) {
        $activeVal = ord($row['active']); // Bit(1) is often returned as a string with one character
        echo "ID: " . $row['user_id'] . " | Name: " . $row['name'] . " | Email: " . $row['email'] . " | Active: " . $activeVal . "\n";
    }
} else {
    echo "No users found in database.\n";
}
?>
