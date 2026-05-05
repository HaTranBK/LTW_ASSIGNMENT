<style>
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
        height: 115px;
    }

    .search-bar {
        flex: 1;
        display: flex;
        align-items: center;
    }

    .search-input {
        padding: 5px;
        border: none;
        width: 200px;
    }

    .search-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .logo {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .logo img {
        height: 70px;
    }

    .user-links {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        align-items: center;
    }

    .user-links > a {
        color: black;
        text-decoration: none;
        margin-right: 20px;
    }

    /* Navbar styles */
    .navbar-container {
        border-top: 1px solid #ccc;
        background-color: #fff;
    }

    .navbar-nav {
        list-style: none;
        text-align: center;
        padding: 0;
        margin: 0;
    }

    .navbar-nav .nav-item {
        display: inline-block;
    }

    .navbar-nav .nav-link {
        display: block;
        padding: 15px;
        text-decoration: none;
        margin: 0 10px;
        position: relative;
        transition: color 0.5s;
    }

    .navbar-nav .nav-link:hover {
        color: #555;
    }

    /* Strike line effect */
    .navbar-nav .nav-link:after {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 0%;
        content: '';
        background: #aaa;
        height: 1px;
        transition: width 0.5s;
    }

    .navbar-nav .nav-link:hover:after {
        width: 100%;
    }

    /* Search sidebar for smaller screens */
    .search-sidebar {
    position: fixed;
    top: 0;
    left: -100%;
    height: 100%;
    width: 500px;
    background-color: white;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
    transition: left 0.3s ease;
    padding: 20px;
    z-index: 1000;
    }

        /* Open state for search sidebar */
    .search-sidebar.open {
        left: 0;
    }

    .search-sidebar .close-btn {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        margin-bottom: 20px;
    }
    .nav-item {
  display: inline-block;
  margin-right: 20px; /* Thêm khoảng cách giữa các thẻ */
}

.nav-item .nav-link {
  display: flex;
  align-items: center;
}

.nav-item .nav-link i {
  margin-right: 8px; /* Khoảng cách giữa icon và tên admin */
}
    /* Media queries */
    @media (max-width: 992px) {
        .user-links .icon .text {
            display: none;
        }
        .search-input {
        display: none;
        }
    }

    @media (min-width: 992px) {
        .nav-in-header {
        display: none;
        }
    }
</style>
<div class="header-container">
    <!-- <nav class="navbar navbar-expand-lg nav-in-header">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Just In</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Designers</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Clothing</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Shoes</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Bags & Accessories</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Home & Beauty</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Men</a></li>
                <li class="nav-item"><a class="nav-link" href="#">The Edit</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sale</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Gifts</a></li>
            </ul>
        </div>
    </nav> -->

    <!-- Search icon for smaller screens -->
   

    <!-- Centered logo -->
    <div class="logo">
        <a href="/ltw/index.php"><img src="https://shop-olivia.com/cdn/shop/files/thumbnail_OliviaLogo-BLK_400x.png?v=1689365415" alt="Olivia"></a>
    </div>

    <!-- User links on the right -->


    <?php
        if (!isset($_SESSION['email_ad'])) {
        ?>
         <div class="user-links">
        <a href="/ltw/admin/login.php" class="icon"><i class="fas fa-user"></i><span class="text"> Login</span></a>
        
    </div>
        
    <?php
        } else {
        ?>

<div class="nav-item">
            <a class="nav-link" href="<?php echo $rootPath?>/index.php">
            <i class="fa-light fa-crown"></i>
              <?php 
                $email = $_SESSION['email_ad'];
                $sqlAdmin = "SELECT name FROM admin WHERE email = '$email'";
                $ketQua = $conn->query($sqlAdmin);
                $admin = $ketQua->fetch_array();
                echo $admin['name'];
              ?>
            </a>
          </div>
          <div class="nav-item">
            <a class="nav-link" href="<?php echo $rootPath?>/logout.php">Log Out</a>
          </div>

       
         
        <?php
    }
    ?>

    
</div>




<!-- Search sidebar for smaller screens -->
<div id="searchSidebar" class="search-sidebar">
    <button class="close-btn" onclick="toggleSearchSidebar()"></button>
    <form action="/ltw/search.php" method="get">
        
                 <button class="btn btn-primary round-circle" type="submit"><i class="fa-regular fa-magnifying-glass text-white"></i></button>

        <input type="text" name="query" placeholder="What are you looking for?" class="search-input-responsive" style="width: 200px;">
    </form> 
</div>
<div class="navbar-container" style="background-color:rgba(248,249,250,1)!important">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto stroke">
                <li class="nav-item"><a class="nav-link" href="<?php echo $rootPath ?>">Home</a></li>
                
                <li class="nav-item"><a class="nav-link" href="<?php echo $rootPath?>/report.php">Static</a></li>
                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Manage
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo $rootPath?>/users/">User</a></li>
              <li><a class="dropdown-item" href="<?php echo $rootPath?>/posts/">News</a></li>
              <li><a class="dropdown-item" href="<?php echo $rootPath?>/products/">Product</a></li>
              <li><a class="dropdown-item" href="<?php echo $rootPath?>/contacts/">Contact</a></li>
              <li><a class="dropdown-item" href="<?php echo $rootPath?>/orders">Order</a></li>
              
             
            </ul>
          </li>
                
            </ul>
        </div>
    </nav>
</div>

<script>
    function toggleSearchSidebar() {
        // Kiểm tra nếu màn hình nhỏ hơn 992px mới cho mở sidebar
        if (window.innerWidth <= 992) {
            const sidebar = document.getElementById('searchSidebar');
            sidebar.classList.toggle('open');
        }
    }

    // Đóng sidebar nếu thay đổi kích thước cửa sổ và vượt quá 992px
    window.onresize = function() {
        if (window.innerWidth > 992) {
            const sidebar = document.getElementById('searchSidebar');
            if (sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
            }
        }
    };
</script>
