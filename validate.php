<?php
function validateEmail($email) {
    $error = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ."; 
    }
    return $error;
}

function validatePhone($phone) {
    $error = "";
    // Bỏ qua các ký tự khoảng trắng nếu có và check đúng 10 số
    if (!preg_match("/^[0-9]{10}$/", trim($phone))) {
        $error = "Số điện thoại phải bao gồm 10 chữ số.";
    }
    return $error;
}

function validatePassword($password) {
    $error = "";
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $error = "Mật khẩu phải gồm ít nhất 8 kí tự và chứa ít nhất 1 chữ số, 1 chữ in hoa, 1 chữ thường, 1 kí tự đặc biệt.";
    } 
    return $error;
}

function validateURL($url) {
    $error = "";
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        $error = "URL không hợp lệ.";
    }
    return $error;
}

function checkPassword($password1, $password2) {
    $error = "";
    if ($password1 !== $password2) {
        $error = "Mật khẩu không khớp.";
    }
    return $error;
}

function checkEmailExist($email) {
    global $conn; // Gọi biến $conn đã được khởi tạo từ file database/DB.php
    $error = "";
    
    if (!$conn) {
        return "Lỗi kết nối cơ sở dữ liệu.";
    }

    // Sử dụng Prepared Statement để bảo mật, chống lỗi ngoặc kép và SQL Injection
    $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $error = "Email đã tồn tại.";
    }
    
    $stmt->close();
    return $error;
}
?>