<?php
require_once '../database/DB.php';

$newPassword = '123456';
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$sql = "UPDATE admin SET password = '$hashedPassword' WHERE email = 'admin@hcmut.edu.vn'";

if ($conn->query($sql)) {
    echo "Đã reset mật khẩu admin thành công!<br>";
    echo "Email: admin@hcmut.edu.vn<br>";
    echo "Password: 123456<br>";
    echo "<br><a href='login.php'>Quay lại đăng nhập</a>";
} else {
    echo "Lỗi: " . $conn->error;
}
?>
