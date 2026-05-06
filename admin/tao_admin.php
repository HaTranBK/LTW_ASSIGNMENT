<?php
// Gọi file kết nối Database của bạn
require_once '../database/DB.php';

// Thông tin tài khoản admin muốn tạo
$email = 'admin@hcmut.edu.vn'; 
$name = 'Super Admin';
$mat_khau_goc = '123456'; 
$role = 1; // 1: Quản trị cấp cao, 0: Nhân viên

// 1. Mã hóa mật khẩu
$mat_khau_bam = password_hash($mat_khau_goc, PASSWORD_DEFAULT);

// 2. Kiểm tra xem email đã tồn tại chưa
$checkEmail = $conn->query("SELECT * FROM admin WHERE email = '$email'");

if ($checkEmail->num_rows > 0) {
    echo "Email này đã được sử dụng!";
} else {
    // 3. Thêm vào database
    $sqlInsert = "INSERT INTO admin (email, password, name, role) 
                  VALUES ('$email', '$mat_khau_bam', '$name', $role)";
    
    if ($conn->query($sqlInsert) === TRUE) {
        echo "Tạo tài khoản Admin thành công! Bạn có thể xóa file này đi.";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
$conn->close();
?>