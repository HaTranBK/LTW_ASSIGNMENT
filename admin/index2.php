<?php
session_start();
ob_start();
$rootPath = '/LTW_ASSIGNMENT/admin';
if (!isset($_SESSION["email_ad"])) {
    header('location: ../login.php');
    exit(); // Nên thêm exit() sau header để dừng thực thi code bên dưới
}
require_once '../database/DB.php';
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
    <link rel="icon" type="image/png" href="assets/images/icon/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metismenujs.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
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
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index2.php" style="font-size: 28px; font-weight: 800; text-transform: uppercase; color: white; text-decoration: none; letter-spacing: 2px;">OLIVIA</a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true" style="background-color: purple; color: white; border-radius: 5px;"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa-solid fa-shop"></i> <span>Products</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa-solid fa-comments"></i> <span>Comments</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa-solid fa-cart-shopping"></i> <span>Orders</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa-solid fa-phone"></i> <span>Contact</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area" style="padding-bottom: 20px;">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-6 clearfix">
                        <div class="nav-btn float-start">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box float-start">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info ngang hàng với search bar -->
                    <div class="col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                        <div class="dropdown" style="padding-right: 15px;">
                            <div class="d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                                <span style="font-size: 15px; font-weight: 600; color: black; margin-right: 10px;">Thinh</span>
                                <img src="assets/images/author/avatar.png" alt="avatar" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px; object-fit: cover;">
                                <i class="fa-solid fa-angle-down" style="color: black; font-size: 14px;"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-end mt-2" style="border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                <a class="dropdown-item" href="profile.html"><i class="fa-solid fa-user" style="margin-right: 8px;"></i> My Profile</a>
                                <a class="dropdown-item" href="settings.html"><i class="fa-solid fa-gear" style="margin-right: 8px;"></i> Account Settings</a>
                                <a class="dropdown-item" href="reset-pass.html"><i class="fa-solid fa-lock" style="margin-right: 8px;"></i> Reset Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket" style="margin-right: 8px;"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            
            <div class="main-content-inner" id="main-content">
                <!-- sales report area start -->
                <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <!-- Tăng kích thước biểu đồ bằng cách đổi từ col-xl-3 thành col-xl-6 -->
                        <div class="col-xl-6 col-lg-6 col-md-12 mt-4">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Product Sold</h4>
                                        <select class="custome-select border-0 pe-3">
                                            <option selected="">Last 7 Days</option>
                                            <option value="0">Last 7 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <canvas id="coin_sales4" height="100"></canvas>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-lg-6 col-md-12 mt-4">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Orders</h4>
                                        <select class="custome-select border-0 pe-3">
                                            <option selected="">Last 7 Days</option>
                                            <option value="0">Last 7 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <canvas id="coin_sales6" height="100"></canvas>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- visitor graph area end -->

                <!-- order list area start -->
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Order List</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center" style="min-width: 900px;">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th style="text-align: left;">Name Receiver</th>
                                        <th>Payment</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Thêm điều kiện WHERE DATE(updated_at) = CURDATE() để chỉ lấy đơn của ngày hôm nay
                                    $sql = "SELECT order_id, user_id, name_receiver, payment, updated_at, status 
                                            FROM `order` 
                                            WHERE DATE(updated_at) = CURDATE() 
                                            ORDER BY order_id DESC LIMIT 15";
                                    $result = mysqli_query($conn, $sql); 

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Format lại số tiền
                                            $formattedPayment = number_format($row['payment'], 0, ',', '.') . ' ₫';
                                            
                                            // Lấy ra giờ:phút cho gọn vì đã biết là ngày hôm nay, hoặc giữ nguyên Ngày/Tháng/Năm
                                            $orderDate = date('H:i - d/m/Y', strtotime($row['updated_at']));

                                            // Đặt màu cho Status
                                            $statusColor = 'black';
                                            if ($row['status'] == 'Đang xử lý') {
                                                $statusColor = '#f39c12'; // Màu cam
                                            } elseif ($row['status'] == 'Đã hoàn thành') {
                                                $statusColor = '#27ae60'; // Màu xanh
                                            } elseif ($row['status'] == 'Đã hủy') {
                                                $statusColor = '#c0392b'; // Màu đỏ
                                            }

                                            echo "<tr>";
                                            echo "<td>#" . $row['order_id'] . "</td>";
                                            echo "<td>" . $row['user_id'] . "</td>";
                                            echo "<td style='text-align: left;'>" . htmlspecialchars($row['name_receiver']) . "</td>";
                                            echo "<td>" . $formattedPayment . "</td>";
                                            
                                            // In cột thời gian 
                                            echo "<td>" . $orderDate . "</td>";
                                            
                                            echo "<td style='color: {$statusColor}; font-weight: 600;'>" . htmlspecialchars($row['status']) . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' style='text-align: center; padding: 20px;'>Hôm nay chưa có đơn hàng nào!</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination_area float-end mt-5">
                            <ul>
                                <li><a href="#"><i class="fa-solid fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#"><i class="fa-solid fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- order list area end -->

            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2026. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- bootstrap 5 js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/metismenujs.min.js"></script>

    <!-- Chart.js 4 -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
    <!-- Highcharts 12.5.0 -->
    <script src="https://code.highcharts.com/12.5.0/highcharts.js"></script>
    <!-- ZingChart 2.9.16 -->
    <script src="https://cdn.zingchart.com/2.9.16-1/zingchart.min.js"></script>
    <script>
    if (typeof zingchart !== "undefined") {
        zingchart.MODULESDIR = "https://cdn.zingchart.com/2.9.16-1/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    }
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>