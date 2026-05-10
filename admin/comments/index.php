<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">Manage Reviews</h1>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner" id="main-content">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Tiêu đề và nút thêm mới -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="header-title mb-0">Review List</h4>
                    </div>

                    <!-- Bảng dữ liệu -->
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center align-middle table-hover">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th scope="col">ID</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col" style="text-align: left;">Title</th>
                                        <th scope="col" style="text-align: left;">Content</th>
                                        <th scope="col">Last Updated</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Truy vấn lấy danh sách đánh giá
                                    $sql = "SELECT review_id, product_id, user_id, title, content, updated_at FROM `review` ORDER BY updated_at DESC";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Format lại thời gian
                                            $formattedDate = date('d/m/Y - H:i', strtotime($row['updated_at']));
                                            
                                            // Rút gọn nội dung review nếu quá dài (hiển thị 50 ký tự đầu)
                                            $contentSnippet = mb_strlen($row['content']) > 50 ? mb_substr($row['content'], 0, 50) . '...' : $row['content'];

                                            echo "<tr>";
                                            // Cột ID
                                            echo "<td>" . $row['review_id'] . "</td>";
                                            
                                            // Cột Product ID
                                            echo "<td>" . $row['product_id'] . "</td>";
                                            
                                            // Cột User ID
                                            echo "<td>" . $row['user_id'] . "</td>";
                                            
                                            // Cột tiêu đề (căn trái)
                                            echo "<td style='text-align: left; font-weight: bold;'>" . htmlspecialchars($row['title']) . "</td>";
                                            
                                            // Cột nội dung (căn trái và rút gọn)
                                            echo "<td style='text-align: left;'>" . htmlspecialchars($contentSnippet) . "</td>";
                                            
                                            // Cột ngày cập nhật
                                            echo "<td>" . $formattedDate . "</td>";
                                            
                                            // Cột Action (Chứa nút Sửa và Xóa)
                                            echo "<td>
                                                <a href='view.php?id=" . $row['review_id'] . "' class='text-success me-3' title='Xem trực tiếp' target='_blank'>
                                                    <i class='fa-solid fa-eye'></i>
                                                </a>
                                                <a href='delete.php?id=" . $row['review_id'] . "' class='text-danger' title='Delete' onclick=\"return confirm('Bạn có chắc chắn muốn xóa đánh giá này không?');\">
                                                    <i class='ti-trash'></i>
                                                </a>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        // Cập nhật colspan thành 7 vì bảng giờ có 7 cột
                                        echo "<tr><td colspan='7' class='text-center py-4'>Chưa có đánh giá nào!</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Kết thúc bảng -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>