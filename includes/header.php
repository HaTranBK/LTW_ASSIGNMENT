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
        height: 70px; /* Kích thước mặc định cho desktop */
        max-width: 100%; /* Đảm bảo logo không vượt quá chiều ngang container */
        object-fit: contain; /* Giữ tỷ lệ logo */
    }

    /* Responsive cho màn hình nhỏ hơn 992px */
    @media (max-width: 992px) {
        .logo img {
            height: 50px; /* Giảm chiều cao logo trên tablet */
        }
    }

    /* Responsive cho màn hình nhỏ hơn 576px */
    @media (max-width: 576px) {
        .logo img {
            height: 40px; /* Giảm chiều cao logo trên điện thoại */
        }
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
    .dropdown {
    display: none;
}
    /* Media queries */
    @media (max-width: 992px) {
        .user-links .icon .text {
            display: none;
        }
        .search-input {
        display: none;
        }
.navbar{
    display:flex;
    justify-content: center; /* Canh giữa theo chiều ngang */
    align-items: center; /* Canh giữa theo chiều dọc */
}
        .dropdown{
           
            display: block;
   

        }
        
.show{
    display:block !important;
}
        .dropbtn {
  background-color:#F8F9FA;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #A8A8A8;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
   display: none; 
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

        
    }

    @media (min-width: 992px) {
        .nav-in-header {
        display: none;
        }
        
    }
     @media (max-width:768px ){
        .user-links > a{
            margin:0;
        }
       .header-container{
padding:0;
.form-control{

padding:0;
}
        }
     }
     @media (max-width:512px ){

        .user-links {
            padding-left:10%;
  display: grid;
  grid-template-columns: auto auto; /* Hai cột cho hai link đầu */
}

.userlink a:nth-of-type(3) {
  grid-column: 1 / -1; /* Thẻ này chiếm toàn bộ hàng */
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
    <div class="search-bar">
    <form action="/ltw/search.php" method="get" class="d-flex me-3" role="search">
        <div class="input-group flex-nowrap search-top">
          <input hidden=true name="sort" value="all">
          <button class="btn round-circle" type="submit" 
        style="background-color: #ffffff; color: #000000; border-color: #000000; border:0; 
               padding: 8px 12px; font-size: 16px;  cursor: pointer;">
    <i class="fa-solid fa-magnifying-glass fa-lg" style="color: inherit;"></i>
</button>
          <input style="border:0; width:100%;" class="form-control" type="search" name="key" placeholder="Search..." id="live-search" aria-label="Search" value="<?php if (!empty($_GET['key'])) echo $_GET['key']; ?>">
          
          <div id="live-search__result"></div>
        </div>
      </form>
    </div>

    <!-- Centered logo -->
    <div class="logo">
        <a href="/ltw/index.php"><img src="https://shop-olivia.com/cdn/shop/files/thumbnail_OliviaLogo-BLK_400x.png?v=1689365415" alt="Olivia"></a>
    </div>

    <!-- User links on the right -->


    <?php
        if (!isset($_SESSION['email_user'])) {
        ?>
         <div class="user-links">
        <a href="/ltw/customer/login.php" class="icon"><i class="fas fa-user"></i><span class="text"> Login</span></a>
        <a href="/ltw/cart.php" class="icon" id="headerCart"><i class="fas fa-shopping-cart" ></i><span class="text"></span></a>
    </div>
        
    <?php
        } else {
        ?>

        <div class="user-links">
        <a href="/ltw/cart.php" class="icon" id="headerCart"><i class="fas fa-shopping-cart" ></i><span class="text"> </span></a>
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                $email = $_SESSION['email_user'];
                $sqlUser = "SELECT name FROM user WHERE email = '$email'";
                $ketQua = $conn->query($sqlUser);
                $user = $ketQua->fetch_array();
                echo $user['name'];
                ?>
              </button>

              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/ltw/customer/my_account.php">Tài khoản</a></li>
                <li><a class="dropdown-item" href="/ltw/customer/my_order.php">Đơn hàng</a></li>
                <li><a class="dropdown-item" href="/ltw/customer/check_out.php">Thanh toán</a></li>
                <li><a class="dropdown-item" href="/ltw/customer/changePassword.php">Đổi mật khẩu</a></li>
                <li> <a class="dropdown-item" href="/ltw/customer/logout.php">Đăng xuất</a></li>
              </ul>


           

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
    <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Menu <i class="fa-solid fa-bars"></i></button>
  <div id="myDropdown" class="dropdown-content">
  <a class="nav-link" href="/ltw">Home</a>
  <a class="nav-link" href="/ltw/product.php">Product</a>
  <a class="nav-link" href="/ltw/contact.php">Contact</a>
  <a class="nav-link" href="/ltw/posts.php">News</a>
  <a class="nav-link" href="/ltw/policy.php">Policy</a>
  </div>
</div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto stroke">
                <li class="nav-item"><a class="nav-link" href="/ltw">Home</a></li>
                
                <li class="nav-item"><a class="nav-link" href="/ltw/product.php">Product</a></li>
                <li class="nav-item"><a class="nav-link" href="/ltw/contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="/ltw/posts.php">News</a></li>
                
                <li class="nav-item"><a class="nav-link" href="/ltw/policy.php">Policy</a></li>
                
            </ul>
        </div>
    </nav>
</div>
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


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
