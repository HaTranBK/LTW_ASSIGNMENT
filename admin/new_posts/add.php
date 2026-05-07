<?php 
// 1. Nạp header (chứa kết nối DB và ob_start() để tránh lỗi redirect)
include '../header.php'; 

$error = '';
$success = '';

// 2. Xử lý khi người dùng bấm nút Submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form và chống SQL Injection cơ bản
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $imageName = '';

    // 3. Xử lý Upload Hình Ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "../../images/"; // Thư mục lưu ảnh
        
        // Kiểm tra xem thư mục có tồn tại chưa, chưa thì tự động tạo
        if(!is_dir($targetDir)){
            mkdir($targetDir, 0777, true);
        }
        
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Đổi tên file ảnh thành chuỗi thời gian ngẫu nhiên để không bị trùng tên
        $newFileName = time() . "_" . uniqid() . "." . $fileType;
        $targetFilePath = $targetDir . $newFileName;
        
        // Chỉ cho phép upload các file ảnh cơ bản
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'avif', 'webp');
        if(in_array($fileType, $allowTypes)){
            // Di chuyển file từ bộ nhớ tạm vào thư mục web
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                $imageName = $newFileName;
            } else {
                $error = "Có lỗi xảy ra khi upload ảnh lên server.";
            }
        } else {
            $error = "Chỉ chấp nhận file ảnh định dạng: JPG, JPEG, PNG, GIF, WEBP.";
        }
    } else {
        // Vì trong database cột image là NOT NULL nên bắt buộc phải có ảnh
        $error = "Vui lòng chọn một ảnh đại diện cho bài viết.";
    }

    // 4. Nếu không có lỗi gì thì thêm vào Database
    if (empty($error) && !empty($title)) {
        $sql = "INSERT INTO `post` (`title`, `content`, `image`) VALUES ('$title', '$content', '$imageName')";
        
        if (mysqli_query($conn, $sql)) {
            // Chuyển hướng về trang danh sách bài viết nếu thành công
            header("Location: index.php");
            exit();
        } else {
            $error = "Lỗi Database: " . mysqli_error($conn);
        }
    } elseif(empty($title)) {
        $error = "Vui lòng nhập tiêu đề bài viết.";
    }
}
?>

<?php include '../sidebar.php'; ?>
<?php include '../topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">Add New Post</h1>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner" id="main-content">
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Create Post</h4>
                    <a href="index.php" class="btn btn-sm btn-secondary"><i class="fa-solid fa-arrow-left me-1"></i> Back to List</a>
                </div>
                <div class="card-body">
                    
                    <!-- Hiển thị thông báo lỗi nếu có -->
                    <?php if(!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form thêm bài viết (Chú ý: phải có enctype="multipart/form-data" mới up được ảnh) -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Featured Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                            <div class="form-text">Recommended size: 800x400px. Max size 2MB.</div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Post Content</label>
                            <textarea class="form-control" id="content" name="content" rows="8" placeholder="Write your content here..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="background-color: purple; border-color: purple;">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>