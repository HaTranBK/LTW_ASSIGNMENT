<?php
    session_start();
    ob_start();
    $rootPath = '/LTW_ASSIGNMENT/customer';
    require_once '../../database/DB.php';
  
    if (isset($_GET['id'])) {
        settype($_GET['id'], 'int');
        if ($_GET['id'] == 0) header('location: /LTW_ASSIGNMENT/404.php');
        $reviewId = $_GET['id'];
        $sqlDelete = "DELETE FROM review WHERE review_id = '$reviewId'";
        $conn->query($sqlDelete);
        $conn->close();
        setcookie('thongBao', 'Đã xóa thành công', time()+5);
        header("location: /LTW_ASSIGNMENT/product.php");
    } else {
        $conn->close();
        header('location: /LTW_ASSIGNMENT/404.php');
    }
?>