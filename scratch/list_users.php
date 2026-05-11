<?php
require_once 'database/DB.php';

$sql = "SELECT id, fullname, email, active FROM user LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Users in DB:\n";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " | Name: " . $row['fullname'] . " | Email: " . $row['email'] . " | Active: " . $row['active'] . "\n";
    }
} else {
    echo "No users found in database.\n";
}
?>
