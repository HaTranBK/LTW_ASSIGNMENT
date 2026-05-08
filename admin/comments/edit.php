<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();

// Kiểm tra đăng nhập
$rootPath = '/LTW_ASSIGNMENT/admin';
if (!isset($_SESSION["email_ad"])) {
    header("location: $rootPath/login.php");
    exit();
}

// Kết nối cơ sở dữ liệu
require_once __DIR__ . '/../../database/DB.php';

// Kiểm tra xem có nhận được ID cần sửa không
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];
$errorMsg = "";

// 1. XỬ LÝ KHI NGƯỜI DÙNG SUBMIT FORM (LƯU DỮ LIỆU)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Lấy và làm sạch dữ liệu đầu vào
    $product_id = (int)$_POST['product_id'];
    $user_id = (int)$_POST['user_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Kiểm tra các trường không được để trống
    if (empty($title) || empty($content) || $product_id <= 0 || $user_id <= 0) {
        $errorMsg = "Vui lòng nhập đầy đủ thông tin hợp lệ!";
    } else {
        // Cập nhật dữ liệu vào Database, cập nhật luôn thời gian hiện tại
        $sql_update = "UPDATE `review` 
                       SET product_id = $product_id, 
                           user_id = $user_id, 
                           title = '$title', 
                           content = '$content', 
                           updated_at = CURRENT_TIMESTAMP() 
                       WHERE review_id = $id";

        if (mysqli_query($conn, $sql_update)) {
            // Cập nhật thành công, chuyển hướng về trang danh sách
            header("Location: index.php");
            exit();
        } else {
            $errorMsg = "Có lỗi xảy ra khi cập nhật: " . mysqli_error($conn);
        }
    }
}

// 2. LẤY DỮ LIỆU CŨ ĐỂ HIỂN THỊ VÀO FORM
$sql_get = "SELECT * FROM `review` WHERE review_id = $id";
$result = mysqli_query($conn, $sql_get);

if ($result && mysqli_num_rows($result) > 0) {
    $reviewData = mysqli_fetch_assoc($result);
} else {
    // Nếu ID không tồn tại trong DB, đẩy về index
    header("Location: index.php");
    exit();
}

?>

<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">Edit Review</h1>
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="header-title mb-0">Update Review Details</h4>
                        <a href="index.php" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left me-2"></i> Back to List
                        </a>
                    </div>

                    <!-- Hiển thị thông báo lỗi nếu có -->
                    <?php if (!empty($errorMsg)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errorMsg; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form cập nhật dữ liệu -->
                    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="product_id" class="form-label">Product ID <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="product_id" name="product_id" value="<?php echo htmlspecialchars($reviewData['product_id']); ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="user_id" class="form-label">User ID <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="user_id" name="user_id" value="<?php echo htmlspecialchars($reviewData['user_id']); ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Review Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($reviewData['title']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Review Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="content" name="content" rows="6" required><?php echo htmlspecialchars($reviewData['content']); ?></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success mt-3">
                            <i class="fa-solid fa-floppy-disk me-2"></i> Save Changes
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>