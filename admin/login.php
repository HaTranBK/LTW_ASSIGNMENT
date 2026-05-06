<?php
session_start();
ob_start();
$rootPath = '/LTW_ASSIGNMENT/admin';
require_once '../database/DB.php';

$tb = '';
$email = '';

// KHI NGƯỜI DÙNG BẤM NÚT ĐĂNG NHẬP
if (isset($_POST['login_ad'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Kiểm tra xem có bỏ trống không
    if (empty($email) || empty($password)) {
        $tb = 'Vui lòng nhập đầy đủ Email và Mật khẩu!';
    } else {
        // 1. Lọc dữ liệu chống SQL Injection
        $email_safe = mysqli_real_escape_string($conn, $email);

        // 2. Tối ưu: Chỉ tìm ĐÚNG 1 người có email trùng khớp
        $sql = "SELECT email, password, name FROM admin WHERE email = '$email_safe' LIMIT 1";
        $ketqua = $conn->query($sql);

        if ($ketqua && $ketqua->num_rows > 0) {
            $row = $ketqua->fetch_assoc();
            
            // 3. So sánh mật khẩu bằng password_verify
            if (password_verify($password, $row["password"])) {
                
                // ĐĂNG NHẬP THÀNH CÔNG
                $_SESSION["email_ad"] = $row["email"];
                $_SESSION["name_ad"] = $row["name"]; // <-- Dòng này để tối ưu cho cái Navbar lúc nãy!
                
                header('location: index.php');
                exit(); // Bắt buộc phải có exit() sau khi dùng header chuyển trang
                
            } else {
                $tb = 'Mật khẩu không chính xác!';
            }
        } else {
            $tb = 'Email không tồn tại trong hệ thống!';
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
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
  <link rel="stylesheet" href="../public/css/showPassword.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php 
    // Lưu ý: Đảm bảo tên file header của bạn đúng nhé, lúc nãy là header.php, ở đây là header1.php
    require './includes/header.php'; 
  ?>

  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-lg-12 col-xl-11">
      <div class="card-body p-md-5">
        <div class="row justify-content-center">
          
          <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
            <p class="text-center text-dark h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng nhập</p>
            
            <?php if (isset($_COOKIE['thongBao'])): ?>
              <p class="alert alert-success text-center"><?= $_COOKIE['thongBao'] ?></p>
            <?php endif; ?>

            <form class="mx-1 mx-md-4" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              
              <div class="d-flex flex-row align-items-center mb-4">
                <div class="input-group flex-nowrap">
                  <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                  <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="Email">
                </div>
              </div>
              
              <div class="d-flex flex-row align-items-center mb-4">
                <div class="input-group flex-nowrap password-container">
                  <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                  <span class="input-group-text bg-white" style="cursor: pointer;">
                    <i class="far fa-eye" id="toggle-password"></i>
                  </span>
                </div>
              </div>

              <?php if (!empty($tb)): ?>
                <div class="alert alert-danger text-center"><?= $tb ?></div>
              <?php endif; ?>

              <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <input type="submit" name="login_ad" value="Login" class="btn btn-primary px-5"
                       style="background-color: #C7C8C9; color: black; border: none; font-weight: bold;"
                       onmouseover="this.style.backgroundColor='#A9AAAB'; this.style.color='white';"
                       onmouseout="this.style.backgroundColor='#C7C8C9'; this.style.color='black';" />
              </div>
            </form>
          </div>

          <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-content-center order-1 order-lg-2">
            <img class="img-fluid rounded w-75 shadow-sm" alt="Login image" src="https://logowik.com/content/uploads/images/script-signature-for-the-name-olivia2544.logowik.com.webp" />
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php require '../includes/footer.php'; ?>
  
  <script src="../public/javascripts/showPassword.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>