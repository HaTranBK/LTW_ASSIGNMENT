<?php
session_start();
require_once '../../database/DB.php'; // Điều chỉnh lại đường dẫn file DB cho đúng với cấu trúc của bạn

if (isset($_GET['id'])) {
    $review_id = intval($_GET['id']);

    // Truy vấn để lấy ID của sản phẩm chứa comment này
    $sql = "SELECT product_id FROM review WHERE review_id = $review_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_id = $row['product_id'];
        $frontend_url = "/LTW_ASSIGNMENT/product_detail.php?productId=" . $product_id . "#review-" . $review_id;
        
        // Chuyển hướng sang trang Frontend
        header("Location: " . $frontend_url);
        exit();
    }
}

// Nếu không tìm thấy hoặc có lỗi thì quay lại trang quản lý review
header("Location: index.php");
exit();
?>