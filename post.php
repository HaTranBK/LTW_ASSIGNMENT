<?php
session_start();
ob_start();
$rootPath = '/LTW_ASSIGNMENT';
require_once './database/DB.php';

// Kiểm tra xem có nhận được ID không
if (isset($_GET['postId'])) {
    // Ép kiểu (int) để chống lỗi và chống hacker (SQL Injection)
    $id = (int)$_GET['postId']; 
    
    $sqlShowPost = "SELECT * FROM post WHERE post_id=$id";
    $post= $conn->query($sqlShowPost);
    
    // Kiểm tra xem ID bài viết có tồn tại trong Database không
    if ($post && $post->num_rows > 0) {
        $row = $post->fetch_assoc();
    } else {
        // Nếu người dùng nhập ID bậy bạ lên URL thì đẩy về trang tin tức
        header("Location: $rootPath/posts.php");
        exit();
    }
} else {
    header("Location: $rootPath/posts.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức: <?php echo htmlspecialchars($row['title']); ?></title>
    <link rel="stylesheet"  href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/contact.css">
</head>
<body>

<?php
    // Chuyển header và navbar vào bên trong thẻ <body> để đồng bộ với các trang khác
    // Tránh bị lỗi cấu trúc HTML
    require './includes/header.php';
    require './includes/navbar.php';
?>

<div class="container-fluid bg-light p-xxl-5 p-md-3">
    <div class="col-lg-8 col-md-10 m-auto text-center py-5 px-3" style="box-shadow: 0 10px 20px rgb(0 0 0 / 10%); background-color: #fff; border-radius: 10px;">
        <h1 class="h1 mb-4" style="color:black"><?php echo htmlspecialchars($row['title']);?></h1>
        
        <!-- SỬA ĐƯỜNG DẪN ẢNH VÀ THÊM ẢNH MẶC ĐỊNH -->
        <?php 
            $imgSrc = !empty($row['image']) ? $rootPath . '/images/' . $row['image'] : $rootPath . '/admin/assets/images/default-image.png'; 
        ?>
        <img src="<?php echo $imgSrc; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" style="width: 90%; border-radius: 8px; object-fit: cover;">
        
        <div class="text-start mt-5 px-3" style="font-size: 1.1rem; line-height: 1.8;">
            <!-- Hàm nl2br() giúp hiển thị đúng các đoạn xuống dòng khi bạn nhập ở trang Admin -->
            <?php echo nl2br(htmlspecialchars($row['content']));?>
        </div>
    </div>
</div>

<?php
    require './includes/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="./public/javascripts/loadCartHeader.js"></script>

<script>
  $(document).ready(function() {
        loadCartAjax();

        $(window).scroll(function(){
            if($(this).scrollTop()>114){
            $("#navbar-top").addClass('fix-nav')
            }else{
                $("#navbar-top").removeClass('fix-nav')
            }}
        )
  });
</script>
<script src="./public/javascripts/liveSearch.js"></script>
</body>
</html>