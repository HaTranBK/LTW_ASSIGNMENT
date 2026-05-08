<!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area" style="padding-bottom: 20px;">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-6 clearfix">
                        <div class="nav-btn float-start">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box float-start">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info ngang hàng với search bar -->
                    <div class="col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                        <div class="dropdown" style="padding-right: 15px;">
                            <div class="d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                                <span style="font-size: 15px; font-weight: 600; color: black; margin-right: 10px;">Thinh</span>
                                <img src="<?php echo $rootPath; ?>/assets/images/author/avatar.png" alt="avatar" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px; object-fit: cover;">
                                <i class="fa-solid fa-angle-down" style="color: black; font-size: 14px;"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-end mt-2" style="border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                <a class="dropdown-item" href="/LTW_ASSIGNMENT/admin/profile.php"><i class="fa-solid fa-user" style="margin-right: 8px;"></i> My Profile</a>
                                <a class="dropdown-item" href="/LTW_ASSIGNMENT/admin/settings.php"><i class="fa-solid fa-gear" style="margin-right: 8px;"></i> Account Settings</a>
                                <a class="dropdown-item" href="/LTW_ASSIGNMENT/admin/reset-pass.php"><i class="fa-solid fa-lock" style="margin-right: 8px;"></i> Reset Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/LTW_ASSIGNMENT/admin/   logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-right: 8px;"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->