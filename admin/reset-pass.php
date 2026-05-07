<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include 'topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">Reset Password</h1>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner" id="main-content">
    <!-- Thêm justify-content-center để đưa form ra giữa -->
    <div class="row mt-4 justify-content-center">
        <!-- Đưa form đổi mật khẩu vào trong Card để đồng bộ với Profile và Settings -->
        <div class="col-lg-6 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Change Your Password</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">Hey! Reset Your Password and comeback again.</p>
                    <form>
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <input type="password" class="form-control" id="oldPassword" placeholder="Enter current password" required>
                        </div>
                        <div class="mb-4">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" required>
                        </div>
                        <button id="form_submit" type="submit" class="btn btn-primary w-100" style="background-color: purple; border-color: purple;">
                            Reset Password <i class="ti-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>