<?php
session_start();
if (!isset($_SESSION["email_ad"])) {
    header('location: ../login.php');
    exit();
}

require_once '../../database/DB.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $action = $_GET['action'];

    if ($action == 'mark_replied') {
        $sql = "UPDATE contact SET status = 1 WHERE id = '$id'";
        if ($conn->query($sql)) {
            $_SESSION['thongBao'] = "Đã đánh dấu đã phản hồi.";
        }
    } elseif ($action == 'delete') {
        $sql = "DELETE FROM contact WHERE id = '$id'";
        if ($conn->query($sql)) {
            $_SESSION['thongBao'] = "Đã xóa liên hệ thành công.";
        }
    }
}

$conn->close();
header("location: index.php");
exit();
?>
