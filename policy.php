<?php
session_start();
ob_start();
$rootPath = '/Project_Programming_Web';
require_once './database/DB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chính sách</title>
    <link rel="stylesheet"  href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/base.css">
    <!-- <link rel="stylesheet" href="./public/css/home.css"> -->
    <style>
        p {
            text-align: justify;
        }
    </style>
</head>

<body>
<?php
    require './includes/header.php';
    require './includes/navbar.php';
?>

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-9 col-md-10 m-auto">
            <div class="accordion" id="accordionExample">
                <!-- A. Điều kiện nhượng quyền -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne" >
                        <button class="accordion-button"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                           <b>A. Franchise Conditions </b>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p> <b>Proof of Legal Identity:</b>- The franchisee must provide valid identification, proof of a clean criminal record, and have the necessary qualifications to apply for relevant permits and licenses.</p>
                            <p><b>Brand Commitment:</b>The franchisee should have a strong interest in the fashion industry, accept the company's brand values and business philosophy, and be fully dedicated to the business. The franchisee must comply with the company's operational standards and demonstrate a high level of cooperation and team spirit.</p>
                            <p><b>Training and Store Operation:</b>The franchisee is required to participate in mandatory training programs before opening the store. This includes training in store operations, management, and customer service. The training period typically lasts between 5 to 7 days, with daily sessions ranging from 7 to 8 hours, depending on the franchisee's learning capacity and the specific requirements of the company.</p>
                            <p><b>Financial and Operational Capacity:</b> The franchisee must ensure they have the financial capability to cover initial investments, operational expenses (from legal capital sources), and secure a suitable physical location and staff for the store.</p>
                            <p><b>Non-Competition Clause:</b> The franchisee must not simultaneously operate or be involved in any business that directly competes with the brand or is related to the fashion industry.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                       <b> B. Purchase Guidelines </b>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p class="h6">1. Add product to cart</p>
                            <p>
                            Select the Menu item in the upper left corner to display the categories. Then click on the product item or click on the button <button class="btn btn-warning""><i class="fa-sharp fa-solid fa-bag-shopping"></i></button> to add the product to the cart.
                            </p>
                            <p class="h6">2. Order payment
                            </p>
                            <p>
                            Customers need to log in to order  (<a href="<?php echo $rootPath?>/sign_up.php" style="text-decoration: none; color: red;">register now</a> if you don't have an account). Then you enter the necessary information in the form for the staff to confirm the order. 
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   <b>     C. Payment Terms </b>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h6>You can pay in cash or bank transfer</h6>
                            <table class="table" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th scope="col">Bank</th>
                                        <th scope="col">
                                        Account number</th>
                                        <th scope="col">
                                        Account owner</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">OCB</td>
                                        <td>00041000</td>
                                        <td>Shop-Olivia</td>
                                    </tr>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <img src="<?php echo $rootPath?>/public/img/logo.jpg" class="img-fluid mb-2 rounded" alt="">
            <img src="<?php echo $rootPath?>/public/img/logo.jpg" class="img-fluid mb-2 rounded" alt="">
            <img src="<?php echo $rootPath?>/public/img/logo.jpg" class="img-fluid mb-2 rounded" alt="">
        </div>
    </div>
</div>

<?php
$conn->close();
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