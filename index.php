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
    <title>Olivia</title>


    <!-- FONT -->
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'> 
    <link href="https://fonts.cdnfonts.com/css/harmonyos-sans" rel="stylesheet">         
    <!-- FONT -->
                
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <!-- CSS only -->
    <!-- bootstrap cu~ <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/base.css">
    <!-- <link rel="stylesheet" href="./public/css/home.css"> -->
    <style>
        p {
            text-align: justify;
        }

        img {
            width: 100%;
        }

        body{
            font-family: 'Muli', sans-serif;
            margin: 0;
        }

        .title{
            text-transform: uppercase;
            font-weight: 600;
        }
    /* Start content */
        
        .slider{
            position: relative;
            display: flex;
            align-items: flex-end;
            width: 100%;
            height: 100%;
            flex-direction: row;
        }

        .slider img {
            width: 100%;
            height: 100%;
            object-fit:contain;
        }

        .slider-left,
        .slider-right{
           width: 50%;
           padding: 0;
        }

        .slider-content{
            position: absolute;
            font-size: 14px;
            top: 50%; 
            left: 10%; 
            font-weight: 600;
            color: rgb(255, 255, 255);
        }
        
        .slider-content button{
            font-family: 'HarmonyOS Sans', sans-serif;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 30px;
        }

        .slider-content .title{
            font-size: 56px;
            font-family: 'Muli', sans-serif;
            margin: 35px 0;
        }

        .slider-content .subtitle{
            font-size: 14px;
            text-transform: uppercase;
        }

        /* Start the newest */
        .the-newest{
            margin: 64px 0;
        }
        .the-newest .title{
            font-weight: 600;
            font-size: 44px;
            color: rgb(18, 13, 10);
            text-align: center;
        }

        .the-newest .tab-menu{
            text-transform: uppercase;
            justify-content: center;
            align-items: center;
        }

        .the-newest .button{
            margin: 20px;
            border-bottom: 2px solid rgb(18, 13, 10);
            font-size: 16px;
        }
        
        .the-newest .my-tabs > *{
            color: rgba(18, 13, 10, 0.7);
        }

        .tab-content .title{
            font-size: 14px;
        }

        .tab-content .description .name,
        .tab-content .description .price{
            margin-top: 4px;
            font-size: 14px;
            text-align: center;
        }
        
        
        /* End the newest */

        
        /* Start information */
        .information{
            padding: 40px 0;
            background-color: rgb(238, 239, 229);
        }

        .information .title{
            font-size: 14px;
        }

        .information > *{
            color: rgb(84, 71, 54);
            font-size: 16px;
            font-family: 'HarmonyOS Sans', sans-serif;
                                                
        }
        /* End information */
        /*Start Best Seller*/
        /* Đảm bảo tất cả các ô sản phẩm có chiều cao bằng nhau */
        .container.mb-5 .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        
        .container.mb-5 .col-xl-4 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            flex: 1 1 calc(33.333% - 20px); 
            margin: 10px;
            max-width: 33.333%; 
            min-height: 400px; 
        }

        .container.mb-5 .col-xl-4:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

       
        .container.mb-5 .col-xl-4 img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border: 3px solid #ddd;
            border-radius: 50%; 
            transition: border-color 0.3s ease;
        }

        .container.mb-5 .col-xl-4 img:hover {
            border-color: #ff6f61;
        }

       
        .container.mb-5 .col-xl-4 p.h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #444;
            margin-top: 10px;
            text-align: center;
        }

       
        .container.mb-5 .col-xl-4 p:last-child {
            font-size: 1.1rem;
            font-weight: 500;
            color: #ff6f61;
            margin-top: auto; 
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
        }

       
        .container.mb-5 .title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /*End Best Seller*/
        /* responsive */
        @media (max-width: 960px) {
            .slider-content {
                font-size: 12px;
                left: 5%;
                top: 45%;
            }
            .slider-left{
                width: 100%;
            }
            .slider-right{
                width: 0;
            }
        }

        @media (max-width: 576px) {
            .slider-content {
                font-size: 10px;
                left: 3%;
                top: 40%;
            }
            .slider-content .subtitle{
                font-size: 20px ;
            }
            .slider-content .title{
                font-size: 30px;
            }
            .slider-left{
                width: 100%;
            }
            .slider-right{
                width: 0;
            }
        }
        @media (max-width: 768px) {
            .container.mb-5 .col-xl-4 {
                flex: 1 1 calc(50% - 20px); 
                max-width: calc(50% - 20px);
            }
        }

        
        @media (max-width: 576px) {
            .container.mb-5 .col-xl-4 {
                flex: 1 1 100%; 
                max-width: 100%; 
            }
        }
        /* responsive */

    /* End content */

    </style>
</head>

<body>
    <?php
        require './includes/header.php';
        require './includes/navbar.php';
        $bestSellerQueryString = "SELECT product.product_id, `order`.`order_id`, product.name, SUM(order_item.quantity_item) AS number_sold, product.images, product.price
        FROM order_item, product, `order`
        WHERE order_item.product_id = product.product_id 
            AND order_item.order_id = `order`.`order_id` 
            AND MONTH(`order`.`updated_at`) = MONTH(CURRENT_DATE())
            AND YEAR(`order`.`updated_at`) = YEAR(CURRENT_DATE())
        GROUP BY product.product_id
        ORDER BY number_sold DESC
        LIMIT 6";

        $result = mysqli_query($conn,$bestSellerQueryString);
    ?>

<!-- //code giao dien  -->
    <div class="content-container">
        <!-- START SLIDER FLAMIGO -->
        <div class="slider">
            <div class="slider-left">
            <img 
            src="//shop-olivia.com/cdn/shop/files/FlamingoEstateBanner1.jpg?v=1730137450" 
            alt="Flamingo Estate Banner" 
            class="img-fluid" 
            loading="eager" 
            draggable="false"
        >
            </div>
            
            <div class="slider-right">
            <img 
            src="//shop-olivia.com/cdn/shop/files/FlamingoEstateBanner2.jpg?v=1730137527" 
            alt="Flamingo Estate Banner 2" 
            class="img-fluid" 
            loading="eager" 
            draggable="false"
        >        
            </div>
            <div class="slider-content">
                <div class="subtitle">new at olivia</div>
                <div class="title">PLEASURE FROM THE GARDEN</div>
                <!-- <button class="btn btn-light text-uppercase button">explore flamingo estate</button> -->
            </div>
        </div>
        <!-- END SLIDER FLAMINGO -->






        <!-- START THE NEWEST -->
      
     <?php function DisplayBestSeller(){ ?>
            <?php 
                global $result;
                if (mysqli_num_rows($result) == 0){
                    return;
                }
                
            ?>
            <div class="the-newest container-fluid"> 

                <div class="container mb-5">
                    <div class="row text-center">
                        <div class="title" >BEST SELLER OF THE MONTH</div>
                    </div>
                    <div class="row">
                        <?php while($productData = mysqli_fetch_assoc($result)){ ?>
                                
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <a href="product_detail.php?productId=<?php echo $productData['product_id']; ?>">
                                        <img alt="topProduct" width="200" height="200" 
                                        src="public/img/products/<?php echo $productData['images']; ?>"
                                        class="rounded-circle mb-3 mt-3 border border-2" />
                                    </a>
                                    <p class="h4 text-dark" style="text-align: center;"><?php echo $productData['name']; ?></p>
                                    <!-- <a class="btn btn-primary btn-lg" href="product_detail.php?productId=<?php echo $productData['product_id']; ?>">Buy Now</a> -->
                                    <p> <?php echo number_format($productData['price'], 0, ',', '.'); ?>đ </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php 
            DisplayBestSeller();
        ?>
      
      
        


        <!-- END THE NEWEST -->















        <!-- START JOIN THE CULT -->

        <!-- START SLIDER -->
        <div class="slider">
            <div class="slider-left">
            <img 
            src="//shop-olivia.com/cdn/shop/files/cgbanner2_6916d95a-d51f-4aff-aacd-910ae463c80e.jpg?v=1726870379&width=1000 1000w," 
            alt="cgbanner2" 
            class="img-fluid" 
            loading="eager" 
            draggable="false"
        >
            </div>
            
            <div class="slider-right">
            <img 
            src="//shop-olivia.com/cdn/shop/files/cgbanner1.jpg?v=1726869879&width=1400" 
            alt="cgbanner1" 
            class="img-fluid" 
            loading="eager" 
            draggable="false"
        >        
            </div>
            <div class="slider-content">
                <div class="subtitle">in-store exclusive</div>
                <div class="title">Join the CULT</div>
                <!-- <button class="btn btn-light text-uppercase button">explore cult gaia</button> -->
            </div>
        </div>
        <!-- END SLIDER -->
        
        <!-- START FALL 2024 -->
        <div class="the-newest container-fluid">
            <div class="tab-menu mb-4">
                <div class="title">fall 2024</div>
                <nav>
                    <div class="nav nav-underline d-flex justify-content-center flex-nowrap my-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-rabanne-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-rabanne" type="button" role="tab" aria-controls="nav-rabanne"
                        aria-selected="true">RABANNE</button>
                        
                        <button class="nav-link" id="nav-simkhai-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-simkhai" type="button" role="tab" aria-controls="nav-simkhai"
                        aria-selected="false">SIMKHAI</button>
                        
                        <button class="nav-link" id="nav-simon-miller-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-simon-miller" type="button" role="tab" aria-controls="nav-simon-miller"
                        aria-selected="false">SIMON MILLER</button>

                        <button class="nav-link" id="nav-zimmermann-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-zimmermann" type="button" role="tab" aria-controls="nav-zimmermann"
                        aria-selected="false">ZIMMERMANN</button>

                      
                    </div>
                </nav>  
            </div>  
            
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active p-3" id="nav-rabanne" role="tabpanel"
                aria-labelledby="nav-rabanne-tab">
                <!-- START RABANNE -->
                    <div class="rabanne row">
                        <div class="col-6 col-lg-3">
                          <a href="http://localhost/ltw/product_detail.php?productId=14">  <img src="https://shop-olivia.com/cdn/shop/files/rhinestone-pin-cheyenne-blazer-in-ivory-606119.jpg?v=1731022825&width=400" alt="Skirt" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ziva Top in Noir</div>
                                <div class="price">8.985.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                           <a href="http://localhost/ltw/product_detail.php?productId=12"> <img src="https://shop-olivia.com/cdn/shop/files/joelle-embellished-cable-cardigan-in-charcoal-lilac-492855.jpg?v=1731020845&width=600" alt="Skirt" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Leonie Top in Noir</div>
                                <div class="price">32.088.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                          <a href="http://localhost/ltw/product_detail.php?productId=16">  <img src="https://shop-olivia.com/cdn/shop/files/cuffed-benji-pant-in-indigo-643454.jpg?v=1730534570&width=600" alt="Skirt" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Elle Dress in Neptune</div>
                                <div class="price">17.713.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                       <a href="http://localhost/ltw/product_detail.php?productId=17">     <img src="https://shop-olivia.com/cdn/shop/files/giles-pant-in-plum-radish-433332.jpg?v=1730535102&width=600" alt="Skirt" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Cherish Embellished Shirt in Black</div>
                                <div class="price">12.784.000₫</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END RABANNE -->

                <!-- START SIMKHAI -->
                <div class="tab-pane fade p-3" id="nav-simkhai" role="tabpanel"
                aria-labelledby="nav-simkhai-tab">
                    <div class="simkhai row">
                        <div class="col-6 col-lg-4">
                          <a href="#http://localhost/ltw/product_detail.php?productId=23">  <img src="https://shop-olivia.com/cdn/shop/files/begum-sling-70-in-satin-black-856076.jpg?v=1730005396&width=600" alt="Shoes" class="object-fit-contain"> </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ineze Skirt in Black</div>
                                <div class="price">12.579.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-4">
                       <a href="http://localhost/ltw/product_detail.php?productId=24">     <img src="https://shop-olivia.com/cdn/shop/files/davina-embellished-wedge-in-black-943193.jpg?v=1730401110&width=600" alt="Shoes" class="object-fit-contain">
                    </a>  
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Therese Skirt in Garnet</div>
                                <div class="price">47.490.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-4">
                       <a href="http://localhost/ltw/product_detail.php?productId=25">     <img src="https://shop-olivia.com/cdn/shop/files/gilda-glass-slipper-in-pvc-transparent-416580.jpg?v=1731382984&width=600" alt="Shoes" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ziva Top in Noir</div>
                                <div class="price">8.985.000₫</div>
                            </div>
                        </div>

                        

                        

                        
                    </div>
                </div>
                <!-- END SIMKHAI -->

                <!-- START SIMON-MILLER -->
                <div class="tab-pane fade p-3" id="nav-simon-miller" role="tabpanel"
                aria-labelledby="nav-simon-miller-tab">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                       <a href="http://localhost/ltw/product_detail.php?productId=6">     <img src="https://shop-olivia.com/cdn/shop/files/sesame-street-tote-676256.jpg?v=1730197679&width=400" alt="Shoes" class="object-fit-contain">
                     </a>
                       <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ineze Skirt in Black</div>
                                <div class="price">12.579.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                      <a href="http://localhost/ltw/product_detail.php?productId=8">      <img src="https://shop-olivia.com/cdn/shop/files/the-dude-shoulder-bag-in-black-428837.jpg?v=1730291888&width=200" alt="Shoes" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Therese Skirt in Garnet</div>
                                <div class="price">47.490.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                     <a href="http://localhost/ltw/product_detail.php?productId=4">       <img src="https://shop-olivia.com/cdn/shop/files/milo-metallic-vegan-leather-clutch-in-smoky-silver-134768.jpg?v=1730290504&width=400" alt="Shoes" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ziva Top in Noir</div>
                                <div class="price">8.985.000₫</div>
                            </div>
                        </div>

                       

                        <div class="col-6 col-lg-3">
                       <a href="http://localhost/ltw/product_detail.php?productId=7">     <img src="https://shop-olivia.com/cdn/shop/files/simone-bag-in-navy-jet-412526.jpg?v=1730291520&width=400" alt="Shoes" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Elle Dress in Neptune</div>
                                <div class="price">17.713.000₫</div>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <!-- END SIMMON MILLER-->


                <!-- START ZIMMERMANN -->
                <div class="tab-pane fade p-3" id="nav-zimmermann" role="tabpanel"
                    aria-labelledby="nav-zimmermann-tab">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                        <a href="http://localhost/ltw/product_detail.php?productId=18">    <img src="https://shop-olivia.com/cdn/shop/files/barrel-aged-balsamic-vinegar-945614.jpg?v=1730193810&width=400" alt="Shoes" class="object-fit-contain">
                        </a>
                        <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ineze Skirt in Black</div>
                                <div class="price">12.579.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                      <a href="http://localhost/ltw/product_detail.php?productId=19">      <img src="https://shop-olivia.com/cdn/shop/files/roma-heirloom-tomato-candle-871512.jpg?v=1730197395&width=400" alt="Shoes" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Therese Skirt in Garnet</div>
                                <div class="price">47.490.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                  <a href="http://localhost/ltw/product_detail.php?productId=22">          <img src="https://shop-olivia.com/cdn/shop/files/manuka-rich-cream-498030.jpg?v=1730196447&width=400" alt="Shoes" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ziva Top in Noir</div>
                                <div class="price">8.985.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                       <a href="http://localhost/ltw/product_detail.php?productId=20">     <img src="https://shop-olivia.com/cdn/shop/files/california-native-mountain-wildflower-honey-742651.jpg?v=1730193958&width=400" alt="Shoes" class="object-fit-contain">
                            </a>
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Leonie Top in Noir</div>
                                <div class="price">32.088.000₫</div>
                            </div>
                        </div>

                        

                      
                    </div>
                </div>
                 <!-- END ZIMMERMAN --> 

                <!-- START GANNI -->
                <!-- <div class="tab-pane fade p-3" id="nav-ganni" role="tabpanel"
                    aria-labelledby="nav-ganni-tab">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <img src="https://shop-olivia.com/cdn/shop/files/barrel-aged-balsamic-vinegar-945614.jpg?v=1730193810&width=400" alt="Shoes" class="object-fit-contain">
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ineze Skirt in Black</div>
                                <div class="price">12.579.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <img src="https://shop-olivia.com/cdn/shop/files/roma-heirloom-tomato-candle-871512.jpg?v=1730197395&width=400" alt="Shoes" class="object-fit-contain">
                            
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Therese Skirt in Garnet</div>
                                <div class="price">47.490.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <img src="https://shop-olivia.com/cdn/shop/files/manuka-rich-cream-498030.jpg?v=1730196447&width=400" alt="Shoes" class="object-fit-contain">
                            
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Ziva Top in Noir</div>
                                <div class="price">8.985.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <img src="https://shop-olivia.com/cdn/shop/files/california-native-mountain-wildflower-honey-742651.jpg?v=1730193958&width=400" alt="Shoes" class="object-fit-contain">
                            
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Leonie Top in Noir</div>
                                <div class="price">32.088.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <img src="https://shop-olivia.com/cdn/shop/files/fridays-from-the-garden-cookbook-497739.jpg?v=1730194975&width=400" alt="Shoes" class="object-fit-contain">
                            
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Elle Dress in Neptune</div>
                                <div class="price">17.713.000₫</div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3">
                            <img src="https://shop-olivia.com/cdn/shop/files/heritage-extra-virgin-olive-oil-965815.jpg?v=1730195310&width=400" alt="Shoes" class="object-fit-contain">
                            
                            <div class="description mt-3">
                                <div class="title">ulla johnson</div>
                                <div class="name">Cherish Embellished Shirt in Black</div>
                                <div class="price">12.784.000₫</div>
                            </div>
                        </div>
                    </div>
                </div> -->
                 <!-- END GANNI --> 
            </div>
        </div>
        <!-- END FALL 2024 -->
        <!-- END JOIN THE CULT -->

        <!-- START INFORMATION -->
        <div class="information">
            <div class="row">
                <div class="col-12 col-lg-4 mb-5">
                    <div class="box-center d-flex flex-column justify-content-center align-items-center text-center">
                        <svg fill="none" focusable="false" width="24" height="24" class="icon icon--picto-email   " viewBox="0 0 24 24">
                            <path d="M21 8V5H3V8M21 8V19H3V8M21 8L12 12.5L3 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <div class="title my-2">contact us</div>
                        <div class="description">Need to contact us? Just send us an e-mail at thuyen.phamdaonhat@hcmut.edu.vn</div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 mb-5">
                    <div class="box-center d-flex flex-column justify-content-center align-items-center text-center">
                        <svg fill="none" focusable="false" width="24" height="24" class="icon icon--picto-box   " viewBox="0 0 24 24">
                            <path d="M12 21L21 17.1429V6.85714M12 21L3 17.1429V6.85714M12 21V10.7143M21 6.85714L12 3L3 6.85714M21 6.85714L12 10.7143M3 6.85714L12 10.7143" stroke="currentColor" stroke-width="2"></path>
                        </svg>
                        <div class="title my-2">free shipping*</div>
                        <div class="description">Free Puerto Rico and United States shipping on order $400+</div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-4 mb-5">
                    <div class="box-center d-flex flex-column justify-content-center align-items-center text-center">
                        <svg fill="none" focusable="false" width="24" height="24" class="icon icon--picto-chat   " viewBox="0 0 24 24">
                            <path d="M18.3234 10.1404C18.3234 14.6362 14.9806 17.9327 10.473 17.9327M18.3234 10.1404C18.3234 5.64457 14.6693 2 10.1617 2C5.65412 2 2 5.0042 2 9.5C2 10.9769 2.50153 12.5042 3 13.5L2 18.2807L6.4857 16.9369C7.7184 17.6824 8.92606 17.9327 10.473 17.9327M18.3234 10.1404C19.5489 10.7827 22 12.6539 22 15C22 17.3461 21.3333 18.9776 21 19.5L21.5 22L18.5 21.5C16.6487 22.2884 12.4514 22.6788 10.473 17.9327" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <div class="title my-2">customer service</div>
                        <div class="description">We are available from Monday to Friday 11am to 5pm to answer your questions.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END INFORMATION -->
    </div>
    


    <!-- // code giao dien  -->


    
    <?php
        require './includes/footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JavaScript Bundle with Popper -->
    <!-- bootstrap cu~ <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
