<?php
require_once 'database/DB.php';

$sql = "DESCRIBE user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "User table schema:\n";
    while($row = $result->fetch_assoc()) {
        echo $row['Field'] . " - " . $row['Type'] . "\n";
    }
} else {
    echo "Could not describe table user.\n";
}
?>
