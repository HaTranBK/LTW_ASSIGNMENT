<?php
session_start();
ob_start();
$rootPath = '/LTW_ASSIGNMENT/admin/';
if (!isset($_SESSION["email_ad"])) {
    header('location: ../login.php');
}

require_once '../../database/DB.php';
require_once '../../helper/settings.php';

$settings = getSettings();

if (isset($_POST['update_settings'])) {
    $introduction = mysqli_real_escape_string($conn, $_POST['introduction']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    
    $logo = $settings['logo'];
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $logo_name = time() . '_' . $_FILES['logo']['name'];
        if (move_uploaded_file($_FILES['logo']['tmp_name'], '../../images/' . $logo_name)) {
            $logo = '/LTW_ASSIGNMENT/images/' . $logo_name;
        }
    }

    $sql = "UPDATE settings SET 
            logo = '$logo', 
            introduction = '$introduction', 
            phone = '$phone', 
            email = '$email', 
            address = '$address', 
            facebook = '$facebook', 
            instagram = '$instagram' 
            WHERE id = " . $settings['id'];
            
    if ($conn->query($sql)) {
        $_SESSION['thongBao'] = "Cập nhật cài đặt thành công!";
        header("location: index.php");
        exit();
    } else {
        $error = "Lỗi cập nhật: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt hệ thống</title>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require '../header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Cài đặt thông tin trang web</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['thongBao'])): ?>
                        <div class="alert alert-success">
                            <?php 
                            echo $_SESSION['thongBao']; 
                            unset($_SESSION['thongBao']);
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                <label class="form-label d-block">Logo hiện tại</label>
                                <img src="<?php echo $settings['logo']; ?>" alt="Logo" class="img-thumbnail mb-2" style="max-height: 100px;">
                                <input type="file" name="logo" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Giới thiệu công ty</label>
                                    <textarea name="introduction" class="form-control" rows="4"><?php echo $settings['introduction']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $settings['phone']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email liên hệ</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $settings['email']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $settings['address']; ?>">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Facebook Link</label>
                                <input type="url" name="facebook" class="form-control" value="<?php echo $settings['facebook']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Instagram Link</label>
                                <input type="url" name="instagram" class="form-control" value="<?php echo $settings['instagram']; ?>">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="update_settings" class="btn btn-primary px-5" 
                                    style="background-color: #C7C8C9; color: black; border: none;"
                                    onmouseover="this.style.backgroundColor='#A9AAAB'; this.style.color='white';"
                                    onmouseout="this.style.backgroundColor='#C7C8C9'; this.style.color='black';">
                                Lưu thay đổi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
