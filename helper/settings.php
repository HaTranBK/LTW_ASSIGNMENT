<?php
require_once __DIR__ . '/../database/DB.php';

if (!function_exists('getSettings')) {
    function getSettings() {
        global $conn;
        $sql = "SELECT * FROM settings LIMIT 1";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
}
?>
