<?php
session_start();
ob_start();

$rootPath = '/LTW_ASSIGNMENT/admin';

if (!isset($_SESSION["email_ad"])) {
    header('Location: ../login.php');
    exit();
}

require_once '../../database/DB.php';

$error = '';

// Lấy danh sách category để hiển thị select
$sqlCategory = "SELECT * FROM category";
$categoryResult = $conn->query($sqlCategory);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name        = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
    $quantity    = mysqli_real_escape_string($conn, trim($_POST['quantity'] ?? ''));
    $price       = mysqli_real_escape_string($conn, trim($_POST['price'] ?? ''));
    $priceSale   = mysqli_real_escape_string($conn, trim($_POST['priceSale'] ?? '0'));
    $description = mysqli_real_escape_string($conn, trim($_POST['description'] ?? ''));
    $categoryId  = mysqli_real_escape_string($conn, trim($_POST['categoryId'] ?? ''));
    $imageName   = '';

    if ($name == '' || $quantity == '' || $price == '' || $priceSale == '' || $description == '' || $categoryId == '') {
        $error = 'Bạn chưa nhập đủ các trường.';
    } elseif (!is_numeric($quantity) || $quantity < 0) {
        $error = 'Số lượng không hợp lệ.';
    } elseif (!is_numeric($price) || $price < 0) {
        $error = 'Giá không hợp lệ.';
    } elseif (!is_numeric($priceSale) || $priceSale < 0) {
        $error = 'Giá giảm không hợp lệ.';
    } elseif (isset($_FILES['images']) && $_FILES['images']['error'] == 0) {
        $targetDir = '../../public/img/products/';

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileTmp  = $_FILES['images']['tmp_name'];
        $fileName = basename($_FILES['images']['name']);
        $fileSize = $_FILES['images']['size'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        $checkImage = getimagesize($fileTmp);

        if ($checkImage === false) {
            $error = 'File upload không phải là ảnh hợp lệ.';
        } elseif ($fileSize > 5 * 1024 * 1024) {
            $error = 'Ảnh không được vượt quá 5MB.';
        } elseif (!in_array($fileType, $allowTypes)) {
            $error = 'Chỉ chấp nhận ảnh định dạng JPG, JPEG, PNG, GIF, WEBP, AVIF.';
        } else {
            $imageName = time() . '_' . uniqid() . '.' . $fileType;
            $targetFilePath = $targetDir . $imageName;

            if (!move_uploaded_file($fileTmp, $targetFilePath)) {
                $error = 'Có lỗi xảy ra khi upload ảnh lên server.';
            }
        }
    } else {
        $error = 'Vui lòng chọn hình sản phẩm.';
    }

    if (empty($error)) {
        $sqlInsert = "INSERT INTO product 
            (name, category_id, description, images, quantity, price, price_sale)
            VALUES 
            ('$name', '$categoryId', '$description', '$imageName', '$quantity', '$price', '$priceSale')";

        if ($conn->query($sqlInsert)) {
            setcookie('thongBao', 'Thêm sản phẩm thành công', time() + 5);
            header('Location: index.php');
            exit();
        } else {
            $error = 'Lỗi Database: ' . $conn->error;

            // Nếu insert DB lỗi thì xoá ảnh vừa upload để tránh file rác
            if ($imageName != '' && file_exists('../../public/img/products/' . $imageName)) {
                unlink('../../public/img/products/' . $imageName);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../includes/css/base.css">
    <link rel="stylesheet" href="../includes/css/home.css">
</head>
<body>
<?php
require '../header.php';
require '../topbar.php';
require '../sidebar.php';
?>

<div class="container-fluid mt-5 mb-3"></div>

<div class="container">
    <div class="row">
        <div class="col text-center h4 text-dark">
            Thêm sản phẩm
        </div>
    </div>

    <?php if (!empty($error)) { ?>
        <div class="row">
            <div class="alert alert-danger"><?= $error ?></div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 shadow p-3 mb-5 bg-body rounded">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" id="name"
                           value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                           placeholder="Nhập tên sản phẩm" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Hàng tồn</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" min="0"
                           value="<?= htmlspecialchars($_POST['quantity'] ?? '') ?>"
                           placeholder="Nhập số lượng hàng còn lại" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" class="form-control" name="price" id="price" min="0"
                           value="<?= htmlspecialchars($_POST['price'] ?? '') ?>"
                           placeholder="Nhập giá bán của sản phẩm" required>
                </div>

                <div class="mb-3">
                    <label for="price_sale" class="form-label">Giá giảm</label>
                    <input type="number" class="form-control" name="priceSale" id="price_sale" min="0"
                           value="<?= htmlspecialchars($_POST['priceSale'] ?? '0') ?>"
                           placeholder="Nhập giá giảm, nếu không giảm thì để 0" required>
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label">Mô tả</label>
                    <textarea id="desc" name="description" class="form-control mt-2" rows="6"
                              placeholder="Nhập mô tả cho sản phẩm" required><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="categoryId" class="form-label">Thể loại</label>
                    <select name="categoryId" class="form-select" id="categoryId" required>
                        <option value="">-- Chọn thể loại --</option>
                        <?php
                        if ($categoryResult && $categoryResult->num_rows > 0) {
                            while ($row = $categoryResult->fetch_assoc()) {
                                $selected = (isset($_POST['categoryId']) && $_POST['categoryId'] == $row['category_id']) ? 'selected' : '';
                        ?>
                            <option value="<?= $row['category_id'] ?>" <?= $selected ?>>
                                <?= htmlspecialchars($row['category_name']) ?>
                            </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Hình sản phẩm</label>
                    <input class="form-control" name="images" type="file" id="formFile" accept="image/*" required>
                    <div class="form-text">Chấp nhận JPG, JPEG, PNG, GIF, WEBP, AVIF. Tối đa 5MB.</div>
                </div>

                <input type="submit" class="btn btn-primary w-100 mt-2" value="Thêm sản phẩm"
                       style="background-color: #C7C8C9; color: black; border: none;"
                       onmouseover="this.style.backgroundColor='#A9AAAB'; this.style.color='white';"
                       onmouseout="this.style.backgroundColor='#C7C8C9'; this.style.color='black';">
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php require '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
