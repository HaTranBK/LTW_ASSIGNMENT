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

    /* Thêm cột trái để làm đối trọng đẩy logo vào giữa */
    .header-left {
        flex: 1;
        display: flex;
        align-items: center;
    }

    /* Cột giữa chứa Logo */
    .logo {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .logo img {
        height: 70px;
    }

    /* Cột phải chứa các nút đăng nhập / đăng xuất */
    .header-right, .user-links {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        gap: 20px;
        align-items: center;
    }

    .user-links > a, .header-right > a {
        color: black;
        text-decoration: none;
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
        margin-right: 20px; /* Khoảng cách giữa các thẻ */
    }

    .navbar-nav .nav-link {
        display: block;
        padding: 15px;
        text-decoration: none;
        position: relative;
        transition: color 0.5s;
    }

    .nav-item .nav-link {
        display: flex;
        align-items: center;
    }

    .nav-item .nav-link i {
        margin-right: 8px; /* Khoảng cách giữa icon và chữ */
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

    /* Media queries */
    @media (max-width: 992px) {
        .user-links .icon .text, .header-right .text {
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

    <div class="header-left"></div>

    <div class="logo">
        <a href="/LTW_ASSIGNMENT/index.php">
            <img src="https://shop-olivia.com/cdn/shop/files/thumbnail_OliviaLogo-BLK_400x.png?v=1689365415" alt="Olivia">
        </a>
    </div>

    <div class="header-right">
        <?php if (!isset($_SESSION['email_ad'])): ?>
        <div class="user-links">
            <a href="/LTW_ASSIGNMENT/admin/login.php" class="icon">
                <i class="fas fa-user"></i><span class="text"> Login</span>
            </a>
        </div>
        <?php else: ?>
            <div class="nav-item">
                <a class="nav-link" href="<?= $rootPath ?>/index.php">
                    <i class="fa-light fa-crown"></i>
                    <?php 
                        // Tối ưu: Nếu chưa sửa login.php thì query DB (có bảo mật), nếu sửa rồi thì lấy thẳng từ Session
                        if (isset($_SESSION['name_ad'])) {
                            echo htmlspecialchars($_SESSION['name_ad']);
                        } else {
                            $email = mysqli_real_escape_string($conn, $_SESSION['email_ad']);
                            $ketQua = $conn->query("SELECT name FROM admin WHERE email = '$email'");
                            if ($ketQua && $ketQua->num_rows > 0) {
                                echo htmlspecialchars($ketQua->fetch_assoc()['name']);
                            } else {
                                echo 'Admin';
                            }
                        }
                    ?>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="<?= $rootPath ?>/logout.php">Log Out</a>
            </div>
        <?php endif; ?>
    </div>
</div>




<!-- Search sidebar for smaller screens -->
<div id="searchSidebar" class="search-sidebar">
    <button class="close-btn" onclick="toggleSearchSidebar()"></button>
    <form action="/LTW_ASSIGNMENT/search.php" method="get">
        
                 <button class="btn btn-primary round-circle" type="submit"><i class="fa-regular fa-magnifying-glass text-white"></i></button>

        <input type="text" name="query" placeholder="What are you looking for?" class="search-input-responsive" style="width: 200px;">
    </form> 
</div>

<?php if (isset($_SESSION['email_ad'])): ?>
    <div class="navbar-container" style="background-color:rgba(248,249,250,1)!important">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto stroke">
                    <li class="nav-item"><a class="nav-link" href="<?php echo $rootPath ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $rootPath?>/report.php">Static</a></li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Manage</a>
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
<?php endif; ?>


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
