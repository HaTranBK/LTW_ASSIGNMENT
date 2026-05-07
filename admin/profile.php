<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include 'topbar.php'; ?>

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h1 class="page-title float-start">My Profile</h1>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner" id="main-content">
    <!-- two-column layout start -->
    <div class="row mt-4">
        <!-- about me card -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">About Me</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-user me-2 text-muted"></i> Full Name</span>
                            <strong>Bui Thinh</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-envelope me-2 text-muted"></i> Email</span>
                            <strong>admin@hcmut.edu.vn</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-phone me-2 text-muted"></i> Phone</span>
                            <strong>+371 2000 0000</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-location-dot me-2 text-muted"></i> Location</span>
                            <strong>HCM, VietNam</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-calendar me-2 text-muted"></i> Member Since</span>
                            <strong>January 2018</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- edit profile card -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" value="Thinh">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" value="Bui">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="admin@hcmut.edu.vn">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" value="+371 2000 0000">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" value="123 Main Street">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" value="HCM">
                            </div>
                            <div class="col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" value="VietNam">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- two-column layout end -->
</div>

<?php include 'footer.php'; ?>