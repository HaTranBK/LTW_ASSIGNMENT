<?php 
include '../header.php'; 

$error = '';
$success = '';

// Lấy ID từ URL (nếu không có thì đẩy về trang index)
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header("Location: index.php");
    exit();
}

// 1. Xử lý khi người dùng bấm Submit để cập nhật
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $old_image = $_POST['old_image']; // Lấy tên ảnh cũ từ thẻ input hidden
    $imageName = $old_image; // Mặc định giữ lại ảnh cũ

    // Nếu người dùng có chọn upload ảnh mới
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "../assets/images/post/";
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        $newFileName = time() . "_" . uniqid() . "." . $fileType;
        $targetFilePath = $targetDir . $newFileName;
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'avif', 'webp');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $imageName = $newFileName; // Cập nhật tên ảnh mới
                
                // Xóa file ảnh cũ khỏi server cho đỡ nặng máy
                if (!empty($old_image) && file_exists($targetDir . $old_image)) {
                    unlink($targetDir . $old_image);
                }
            } else {
                $error = "Có lỗi xảy ra khi upload ảnh lên server.";
            }
        } else {
            $error = "Chỉ chấp nhận file ảnh định dạng: JPG, JPEG, PNG, GIF, WEBP.";
        }
    }

    // 2. Cập nhật vào Database
    if (empty($error) && !empty($title)) {
        $sql = "UPDATE `post` SET title='$title', content='$content', image='$imageName' WHERE post_id=$id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Lỗi Database: " . mysqli_error($conn);
        }
    } elseif(empty($title)) {
        $error = "Vui lòng nhập tiêu đề bài viết.";
    }
}

// 3. Lấy dữ liệu bài viết hiện tại để in ra Form
$sql_get = "SELECT * FROM `post` WHERE post_id=$id";
$result_get = mysqli_query($conn, $sql_get);
$post = mysqli_fetch_assoc($result_get);

// Lỡ người dùng nhập ID bậy bạ không có trong DB
if (!$post) {
    header("Location: index.php");
    exit();
}
?>

<?php include '../sidebar.php'; ?>
<?php include '../topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">Edit Post</h1>
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
                    <h4 class="header-title mb-0">Update Post #<?php echo $post['post_id']; ?></h4>
                    <a href="index.php" class="btn btn-sm btn-secondary"><i class="fa-solid fa-arrow-left me-1"></i> Back to List</a>
                </div>
                <div class="card-body">
                    
                    <?php if(!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form cập nhật -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Lưu lại tên ảnh cũ để xử lý ở PHP -->
                        <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($post['image']); ?>">

                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Featured Image</label>
                            
                            <!-- Hiển thị ảnh cũ -->
                            <?php if(!empty($post['image'])): ?>
                                <div class="mb-2">
                                    <img src="/LTW_ASSIGNMENT/images/<?php echo htmlspecialchars($post['image']); ?>" alt="Current Image" style="height: 100px; border-radius: 5px; border: 1px solid #ddd; padding: 3px;">
                                </div>
                            <?php endif; ?>
                            
                            <!-- Không bắt buộc required nữa vì có thể giữ nguyên ảnh cũ -->
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            <div class="form-text text-muted">Leave blank if you don't want to change the image.</div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Post Content</label>
                            <textarea class="form-control" id="content" name="content" rows="8"><?php echo htmlspecialchars($post['content']); ?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="background-color: purple; border-color: purple;">
                            <i class="fa-solid fa-save me-1"></i> Update Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>