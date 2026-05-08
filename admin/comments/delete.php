<?php
session_start();
ob_start();

// Kiểm tra đăng nhập (để tránh người lạ gõ thẳng URL xóa)
$rootPath = '/LTW_ASSIGNMENT/admin';
if (!isset($_SESSION["email_ad"])) {
    header("location: $rootPath/login.php");
    exit();
}

// Kết nối cơ sở dữ liệu
require_once __DIR__ . '/../../database/DB.php';

// Kiểm tra xem có nhận được ID từ URL không
if (isset($_GET['id'])) {
    // Ép kiểu dữ liệu sang int để bảo mật, chống SQL Injection cơ bản
    $id = (int)$_GET['id'];
    
    // Bảng review không có cột lưu ảnh, nên bỏ qua bước xóa file vật lý.
    
    // Thực thi lệnh xóa đánh giá khỏi Database
    $sql_delete = "DELETE FROM `review` WHERE review_id = $id";
    mysqli_query($conn, $sql_delete);
}

// Đẩy về trang danh sách đánh giá
header("Location: index.php");
exit();
?>