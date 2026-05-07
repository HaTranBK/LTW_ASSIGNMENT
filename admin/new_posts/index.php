<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">Manage Posts</h1>
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
                        <h4 class="header-title mb-0">Post List</h4>
                        <a href="add.php" class="btn btn-primary" style="background-color: purple; border-color: purple;">
                            <i class="fa-solid fa-plus me-2"></i> Add New Post
                        </a>
                    </div>

                    <!-- Bảng dữ liệu -->
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center align-middle table-hover">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" style="text-align: left;">Title</th>
                                        <th scope="col">Last Updated</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Truy vấn lấy danh sách post
                                    $sql = "SELECT post_id, title, updated_at, image FROM `post` ORDER BY updated_at DESC";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Format lại thời gian
                                            $formattedDate = date('d/m/Y - H:i', strtotime($row['updated_at']));
                                            
                                            // Xử lý ảnh (nếu không có ảnh thì hiển thị ảnh mặc định)
                                            $imageSrc = !empty($row['image']) ? '/LTW_ASSIGNMENT/images/' . htmlspecialchars($row['image']) : '/LTW_ASSIGNMENT/admin/assets/images/default-image.png';
                                            // Cột hình ảnh
                                            echo "<td><img src='" . $imageSrc . "' alt='post-img' style='width: 60px; height: 60px; object-fit: cover; border-radius: 5px;'></td>";
                                            
                                            // Cột tiêu đề (căn trái cho dễ đọc)
                                            echo "<td style='text-align: left;'>" . htmlspecialchars($row['title']) . "</td>";
                                            
                                            // Cột ngày cập nhật
                                            echo "<td>" . $formattedDate . "</td>";
                                            
                                            // Cột Action (Chứa nút Sửa và Xóa)
                                            echo "<td>
                                                <a href='edit.php?id=" . $row['post_id'] . "' class='text-primary me-3' title='Edit'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </a>
                                                <a href='delete.php?id=" . $row['post_id'] . "' class='text-danger' title='Delete' onclick=\"return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');\">
                                                    <i class='ti-trash'></i>
                                                </a>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center py-4'>Chưa có bài viết nào!</td></tr>";
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