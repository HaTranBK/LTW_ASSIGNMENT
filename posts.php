<?php
session_start();
ob_start();
$rootPath = '/ltw';
require_once './database/DB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/product.css">

<style>
.btn.btn-primary {
    background-color: #b0b0b0; /* Nền xám */
    color: #000; /* Chữ màu đen */
    border-color: #b0b0b0; /* Viền xám để đồng nhất */
    transition: background-color 0.3s ease; /* Hiệu ứng mượt mà khi hover */
}

.btn.btn-primary:hover {
    background-color: #8c8c8c; /* Nền tối hơn khi hover */
    border-color: #8c8c8c; /* Viền tối hơn khi hover */
}

</style>



    

</head>

<body>
    <?php
    require './includes/header.php';
    require './includes/navbar.php';
    ?>

    <?php
    $sqlShowPosts = "SELECT * FROM post";

    $posts = $conn->query($sqlShowPosts);
    ?>

<h1 style=" text-align: center; font-size:45px;">News</h1>

    <div class="container-fluid mt-5 mb-5">
        <div class="row">

            <div class="col">
                <div class="container mb-5">
                    <div class="row">
                        <?php
                        if ($posts->num_rows > 0) {
                            $totalPosts = $posts->num_rows;
                            $currentPage = 1;
                            if (isset($_GET['page'])) {
                                settype($_GET['page'], 'int'); // tránh injection, trang tự về 0
                                $currentPage = $_GET['page'];
                            }
                            $limit = 6;
                            $totalPage = ceil($totalPosts / $limit);

                            // giới hạn phân trang trong 1-totalPage
                            if ($currentPage > $totalPage) {
                                $currentPage = $totalPage;
                            } elseif ($currentPage < 1) {
                                $currentPage = 1;
                            }

                            $start = ($currentPage - 1) * $limit;
                            $sqlShowPosts = $sqlShowPosts . " LIMIT $start, $limit";
                            $posts = $conn->query($sqlShowPosts);
                            while ($row = $posts->fetch_assoc()) {
                        ?>
                                <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                                    <div class="card h-100" style="height: 200px; border:0;">
                                    <div class="product-img" style="height:250px; display: flex; justify-content: center; align-items: center; overflow: hidden; padding-top:0;">
    <a href="  <?php echo $rootPath ?>/post.php?postId=<?php echo $row['post_id'] ?> ">
        <img src="<?php echo $row['image'] ?>" style="max-width: 100%; max-height: 100%; object-fit: contain;">
    </a>
</div>                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column justify-content-start">
                                                <p style="font-weight:600; color:rgba(0, 0, 0, 0.55); font-family:Harmonia Sans, sans-serif; ">Blog</p>
                                                <h4 class="card-title" style="font-weight:600; ">
      <a href="<?php echo $rootPath ?>/post.php?postId=<?php echo $row['post_id'] ?>" style="color: inherit; text-decoration: none;">
        <?php echo $row["title"]; ?>
    </a>
</h4>
                                            </div>
                                        </div>
                                        <!-- <div class="card-footer d-flex flex-column">
                                            <a href="<?php echo $rootPath ?>/post.php?postId=<?php echo $row['post_id'] ?>" class="btn btn-primary" >Xem chi tiết</a>
                                        </div> -->
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<div class="alert alert-warning" role="alert"><i class="fa-light fa-circle-exclamation"></i> Không tìm thấy tin tức nào</div>';
                        }

                        $conn->close();
                        ?>
                    </div>
                    <?php
                    if ($posts->num_rows > 0) {
                    ?>
                        <div class="row paging">
                            <!-- Phân trang -->
                            <nav class="mt-3">
                                <ul class="pagination pagination-lg d-flex">
                                    <?php
                                    if ($currentPage > 1 && $totalPage > 1) {
                                    ?>
                                        <li class="page-item">
                                            <a href="<?php echo $rootPath ?>/posts.php?page=<?php echo ($currentPage - 1); ?>" class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" data-remote="true"><i class="fa-solid fa-arrow-left"></i></a>
                                        </li>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    for ($i = 1; $i <= $totalPage; $i++) {
                                        if ($i == $currentPage) {
                                    ?>
                                            <li class="page-item active">
                                                <span rel="prev" class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" style="background-color:#C7C8C9; border:0; color:black;"   data-remote="true"><?php echo $i ?></span>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="page-item">
                                                <a data-remote="true" class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="<?php echo $rootPath ?>/posts.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if ($currentPage < $totalPage && $totalPage > 1) {
                                    ?>
                                        <li class="page-item">
                                            <a href="<?php echo $rootPath; ?>/posts.php?page=<?php echo ($currentPage + 1) ?>" class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" data-remote="true"><i class="fa-solid fa-arrow-right"></i></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <?php
    require './includes/footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="./public/javascripts/loadCartHeader.js"></script>

    <script>
        $(document).ready(function() {
            loadCartAjax();

            $(window).scroll(function() {
                if ($(this).scrollTop() > 114) {
                    $("#navbar-top").addClass('fix-nav')
                } else {
                    $("#navbar-top").removeClass('fix-nav')
                }
            })
        });
    </script>
    <script src="./public/javascripts/liveSearch.js"></script>
</body>

</html>