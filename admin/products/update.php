<?php
session_start();
ob_start();

$rootPath = '/LTW_ASSIGNMENT/admin';

if (!isset($_SESSION["email_ad"])) {
    header('Location: ../login.php');
    exit();
}

require_once '../../database/DB.php';

// Lấy productId
if (!isset($_GET['id'])) {
    header('Location: ../../404.php');
    exit();
}

$productId = (int) $_GET['id'];
if ($productId <= 0) {
    header('Location: ../../404.php');
    exit();
}

// Lấy thông tin sản phẩm
$sqlFindProduct = "SELECT * FROM product WHERE product_id = $productId";
$productResult = $conn->query($sqlFindProduct);

if (!$productResult || $productResult->num_rows <= 0) {
    header('Location: ../../404.php');
    exit();
}

$product = $productResult->fetch_assoc();
$tb = '';

// Khi nút update được nhấn
if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
    $quantity = (int) ($_POST['quantity'] ?? 0);
    $price = (int) ($_POST['price'] ?? 0);
    $priceSale = (int) ($_POST['priceSale'] ?? 0);
    $description = mysqli_real_escape_string($conn, trim($_POST['description'] ?? ''));
    $categoryId = (int) ($_POST['categoryId'] ?? 0);
    $imagesOld = mysqli_real_escape_string($conn, $_POST['imagesOld'] ?? $product['images']);

    // Mặc định giữ ảnh cũ nếu không chọn ảnh mới
    $images = $imagesOld;

    if ($name === '' || $description === '' || $categoryId <= 0) {
        $tb .= 'Bạn chưa nhập đủ các trường<br/>';
    } elseif ($quantity < 0 || $price < 0 || $priceSale < 0) {
        $tb .= 'Số lượng và giá không được âm<br/>';
    } else {
        // Nếu có chọn ảnh mới thì mới xử lý upload
        if (isset($_FILES['images']) && $_FILES['images']['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($_FILES['images']['error'] === UPLOAD_ERR_OK) {
                $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $fileName = basename($_FILES['images']['name']);
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($fileExt, $allowedExt)) {
                    $tb .= 'File hình không hợp lệ. Chỉ cho phép jpg, jpeg, png, gif, webp<br/>';
                } else {
                    $newFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $fileName);
                    $uploadDir = '../../public/img/products/';
                    $uploadPath = $uploadDir . $newFileName;

                    if (move_uploaded_file($_FILES['images']['tmp_name'], $uploadPath)) {
                        $images = mysqli_real_escape_string($conn, $newFileName);

                        // Xóa ảnh cũ nếu có ảnh mới và file cũ tồn tại
                        $oldPath = $uploadDir . $imagesOld;
                        if (!empty($imagesOld) && file_exists($oldPath) && is_file($oldPath)) {
                            unlink($oldPath);
                        }
                    } else {
                        $tb .= 'Không thể upload file hình<br/>';
                    }
                }
            } else {
                $tb .= 'Lỗi file hình - mã lỗi: ' . $_FILES['images']['error'] . '<br/>';
            }
        }

        if ($tb === '') {
            $sqlUpdate = "UPDATE product SET 
                            name = '$name',
                            category_id = $categoryId,
                            description = '$description',
                            images = '$images',
                            quantity = $quantity,
                            price = $price,
                            price_sale = $priceSale
                          WHERE product_id = $productId";

            if ($conn->query($sqlUpdate)) {
                setcookie('thongBao', 'Cập nhật sản phẩm thành công', time() + 5, '/');
                header('Location: index.php');
                exit();
            } else {
                $tb .= 'Lỗi cập nhật database: ' . $conn->error . '<br/>';
            }
        }
    }

    // Giữ dữ liệu vừa nhập lại trên form nếu update lỗi
    $product['name'] = $_POST['name'] ?? $product['name'];
    $product['quantity'] = $_POST['quantity'] ?? $product['quantity'];
    $product['price'] = $_POST['price'] ?? $product['price'];
    $product['price_sale'] = $_POST['priceSale'] ?? $product['price_sale'];
    $product['description'] = $_POST['description'] ?? $product['description'];
    $product['category_id'] = $_POST['categoryId'] ?? $product['category_id'];
    $product['images'] = $imagesOld;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2RdKQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        <div class="col text-center h4 text-dark">Cập nhật sản phẩm</div>
    </div>

    <?php if (!empty($tb)) { ?>
        <div class="row">
            <div class="alert alert-danger"><?= $tb ?></div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 shadow p-3 mb-5 bg-body rounded">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?= $productId ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['name']) ?>" id="name" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Hàng tồn</label>
                    <input type="number" class="form-control" name="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" id="quantity" placeholder="Nhập số lượng hàng còn lại">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($product['price']) ?>" id="price" placeholder="Nhập giá bán của sản phẩm">
                </div>

                <div class="mb-3">
                    <label for="price_sale" class="form-label">Giá giảm</label>
                    <input type="number" class="form-control" name="priceSale" value="<?= htmlspecialchars($product['price_sale']) ?>" id="price_sale" placeholder="Giảm giá">
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label">Mô tả</label>
                    <textarea id="desc" name="description" class="form-control mt-2" rows="6" placeholder="Nhập mô tả cho sản phẩm"><?= htmlspecialchars($product['description']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="categoryId" class="form-label">Thể loại</label>
                    <select name="categoryId" class="form-select" id="categoryId">
                        <?php
                        $sqlCategory = "SELECT * FROM category";
                        $category = $conn->query($sqlCategory);
                        while ($row = $category->fetch_assoc()) {
                        ?>
                            <option value="<?= $row['category_id'] ?>" <?= ((int)$product['category_id'] === (int)$row['category_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['category_name']) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ảnh hiện tại</label><br>
                    <img src="../../public/img/products/<?= htmlspecialchars($product['images']) ?>" width="200" alt="Ảnh sản phẩm" class="mb-2">
                    <input type="hidden" name="imagesOld" value="<?= htmlspecialchars($product['images']) ?>">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Chọn ảnh mới nếu muốn thay đổi</label>
                    <input class="form-control" name="images" type="file" id="formFile" accept="image/*">
                </div>

                <input type="submit" class="btn w-100 mt-2" value="Cập nhật" name="update"
                       style="background-color: #C7C8C9; color: black; border: none;"
                       onmouseover="this.style.backgroundColor='#A9AAAB'; this.style.color='white';"
                       onmouseout="this.style.backgroundColor='#C7C8C9'; this.style.color='black';">
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php require '../footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
$conn->close();
?>
