<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
$rootPath = '/LTW_ASSIGNMENT/admin';
if (!isset($_SESSION["email_ad"])) {
    // Dùng đường dẫn tuyệt đối bắt đầu từ tên thư mục gốc của bạn
    header('location: /LTW_ASSIGNMENT/admin/login.php');
    exit();
}
// Dùng __DIR__ để neo chính xác thư mục chứa file header.php
require_once __DIR__ . '/../database/DB.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Olivia - Ecommerce Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ecommerce dashboard with order tracking, revenue charts, and customer activity overview.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo $rootPath; ?>/assets/images/icon/logo.png">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/metismenujs.min.css">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/swiper-bundle.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo $rootPath; ?>/assets/css/responsive.css">
</head>

<body>
    <a href="#main-content" class="skip-link">Skip to main content</a>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    
    <!-- page container area start -->
    <div class="page-container">