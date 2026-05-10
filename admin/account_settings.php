<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include 'topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">Account Settings</h1>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner" id="main-content">
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <!-- Tab Content Panels -->
                        <div class="col-lg-9 mt-lg-0 mt-4">
                            <div class="tab-content" id="settings-tabContent">
                                <!-- General Tab -->
                                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <h4 class="header-title mb-4">Profile Information</h4>
                                    
                                    <!-- Profile Photo -->
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="me-4">
                                            <picture>
                                                <source srcset="<?php echo $rootPath; ?>/assets/images/author/avatar.avif" type="image/avif">
                                                <img src="<?php echo $rootPath; ?>/assets/images/author/avatar.png" alt="Profile photo" class="rounded-circle" width="80" height="80">
                                            </picture>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Profile Photo</h5>
                                            <button type="button" class="btn btn-sm btn-outline-primary" style="color: purple; border-color: purple;">Change Photo</button>
                                        </div>
                                    </div>
                                    
                                    <!-- Profile Form -->
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="fullName" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="fullName" value="Thinh">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" value="admin@hcmut.edu.vn">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="timezone" class="form-label">Timezone</label>
                                                <select class="form-select" id="timezone">
                                                    <option value="UTC+7">UTC+7:00 VietNam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bio" class="form-label">Bio</label>
                                            <textarea class="form-control" id="bio" rows="4" style="height: auto; min-height: 150px;">Full-stack developer and admin dashboard enthusiast. Building modern web applications with a focus on clean UI and great user experience.</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="background-color: purple; border-color: purple;">Save Changes</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>