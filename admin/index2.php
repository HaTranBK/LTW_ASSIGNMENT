<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include 'topbar.php'; ?>

<div class="main-content-inner" id="main-content">
    <!-- sales report area start -->
    <div class="sales-report-area sales-style-two">
        <div class="row">
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
    <!-- sales report area end -->

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
                        $sql = "SELECT order_id, user_id, name_receiver, payment, updated_at, status 
                                FROM `order` 
                                WHERE DATE(updated_at) = CURDATE() 
                                ORDER BY order_id DESC LIMIT 15";
                        $result = mysqli_query($conn, $sql); 

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $formattedPayment = number_format($row['payment'], 0, ',', '.') . ' ₫';
                                $orderDate = date('H:i - d/m/Y', strtotime($row['updated_at']));
                                
                                $statusColor = 'black';
                                if ($row['status'] == 'Đang xử lý') {
                                    $statusColor = '#f39c12';
                                } elseif ($row['status'] == 'Đã hoàn thành') {
                                    $statusColor = '#27ae60';
                                } elseif ($row['status'] == 'Đã hủy') {
                                    $statusColor = '#c0392b';
                                }

                                echo "<tr>";
                                echo "<td>#" . $row['order_id'] . "</td>";
                                echo "<td>" . $row['user_id'] . "</td>";
                                echo "<td style='text-align: left;'>" . htmlspecialchars($row['name_receiver']) . "</td>";
                                echo "<td>" . $formattedPayment . "</td>";
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

<?php include 'footer.php'; ?>