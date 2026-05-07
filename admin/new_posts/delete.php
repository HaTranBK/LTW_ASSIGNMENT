<?php
session_start();
ob_start();

// Kiểm tra đăng nhập (để tránh người lạ gõ thẳng URL xóa bài)
$rootPath = '/LTW_ASSIGNMENT/admin';
if (!isset($_SESSION["email_ad"])) {
    header("location: $rootPath/login.php");
    exit();
}
require_once __DIR__ . '/../../database/DB.php';

// Kiểm tra xem có nhận được ID không
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // 1. Tìm tên file ảnh để xóa nó khỏi thư mục (cho đỡ rác server)
    $sql_img = "SELECT image FROM `post` WHERE post_id = $id";
    $result_img = mysqli_query($conn, $sql_img);
    
    if ($result_img && mysqli_num_rows($result_img) > 0) {
        $row = mysqli_fetch_assoc($result_img);
        $imageName = $row['image'];
        
        if (!empty($imageName)) {
            $imagePath = "../../images/" . $imageName;
            // Hàm unlink() dùng để xóa file vật lý
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
    
    // 2. Xóa bài viết khỏi Database
    $sql_delete = "DELETE FROM `post` WHERE post_id = $id";
    mysqli_query($conn, $sql_delete);
}

// 3. Đẩy về trang danh sách
header("Location: index.php");
exit();