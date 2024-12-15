<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

    <title>Wellcome To My Shop</title>
    <style>
        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }

        /* body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    } */

        .product-grid {
            display: flex;
            gap: 20px;
        }

        .product-item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            width: 200px;
        }

        .product-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-item p {
            margin: 10px 0;
        }

        .price {
            color: red;
            font-weight: bold;
        }

        .product-grid-ness {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .product-item-ness {
            background-color: #d9d9d9;
            border: 1px solid #d9d9d9;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            width: 250px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-item-ness img {
            width: 100%;
            height: auto;
        }

        .product-item-ness h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .product-item-ness p {
            margin: 0;
            font-size: 16px;
            color: #ff0000;
            font-weight: bold;
        }
    </style>

<body>
    <!--Banner-->
    <div id="demo" class="carousel slide container-lg" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./public/image/image_slide/image_slide1.jpg" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="./public/image/image_slide/image_slide2.jpg" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="./public/image/image_slide/image_slide3.jpg" class="d-block" style="width:100%">
            </div>
        </div>
    </div>

    <section class="card_Outstanding">
        <div class="product-grid">
            <div class="product-item">
                <img style="width:170px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrOjEYRWx09kF1c6fbMZOGd0gh4TX5wiGTGA&s">
                <p>Long sleeve jacket</p>
                <span style="color: #FF0000;" class="price">$230</span>
                <span style="text-decoration:line-through">$330</span>
            </div>
            <div class="product-item">
                <img src="data:image/jpeg;base64,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" alt="">
                <p>Jacket</p>
                <span style="color: #FF0000;">$340</span>
                <span style="text-decoration:line-through">$430</span>
            </div>
            <div class="product-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZ4uP8qEcBlyJqqTDAOBv0Iy7T2N5Wl2-vRA&s" alt="">
                <p>Warm coat</p>
                <span style="color: #FF0000;">$500</span>
                <span style="text-decoration:line-through">$620</span>
            </div>
            <div class="product-item">
                <img style="width: 200px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtPmEUGMnincssl3WhJPJ7al2wj-GVo_5ABQ&s" alt="">
                <p>T-shirt</p>
                <span style="color: #FF0000;">$230</span>
                <span style="text-decoration:line-through">$330</span>
            </div>
        </div>
    </section>


    <!-- Card Carousel -->
    <div class="container text-center my-3">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/ao_thun/aothun1.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/ao_thun/aothun2.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/ao_thun/aothun3.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/ao_thun/aothun4.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/ao_thun/aothun5.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/jearn/jearn1.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/polo/polo2.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="./public/image/jearn/jearn3.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev bg-transparent w-auto" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-auto" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>

    <section class="card_necessary">
        <div class="product-grid-ness">
            <div class="product-item-ness">
                <img src="https://down-vn.img.susercontent.com/file/2a01836c6473f4480792a29371959e4f" alt="Long sleeve">
                <h3>Long sleeve</h3>
                <span style="color: #FF0000;" class="price">$353</span>
                <span style="text-decoration:line-through">$300</span>
            </div>
            <div class="product-item-ness">
                <img src="https://cdn.vuahanghieu.com/unsafe/0x900/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/09/ao-bomber-nam-lacoste-men-s-insulated-padded-bomber-jacket-bh0549-02s-mau-be-size-46-65012752c03f9-13092023100658.jpg" alt="Long sleeve jacket">
                <h3>Long sleeve jacket</h3>
                <span style="color: #FF0000;">$130</span>
                <span style="text-decoration:line-through">$330</span>
            </div>
            <div class="product-item-ness">
                <img src="https://img.ws.mms.shopee.vn/vn-11134201-7r98o-loouxm1ftxsgca" alt="Warm coat">
                <h3>Warm coat</h3>
                <span style="color: #FF0000;">$99</span>
                <span style="text-decoration:line-through">$130</span>
            </div>
            <div class="product-item-ness">
                <img src="https://m.media-amazon.com/images/I/61B5kZ7LrQL._AC_SX385_.jpg" alt="Cardigan">
                <h3>Warm coat</h3>
                <span style="color: #FF0000;">$230</span>
                <span style="text-decoration:line-through">$330</span>
            </div>
            <div class="product-item-ness">
                <img src="https://360.com.vn/wp-content/uploads/2023/11/ANHTK407-APTTK403-QGNTK407-2-Custom.jpg" alt="Long sleeve jacket">
                <h3>Long sleeve </h3>
                <span style="color: #FF0000;">$100</span>
                <span style="text-decoration:line-through">$230</span>
            </div>
            <div class="product-item-ness">
                <img src="https://product.hstatic.net/1000146544/product/hinh_anh_15-05-2024_luc_15.53_2_0af6bbb6512f4b798befed42d33c4d69_master.jpg" alt="Warm coat">
                <h3>Polo</h3>
                <span style="color: #FF0000;">$530</span>
                <span style="text-decoration:line-through">$680</span>
            </div>
            <div class="product-item-ness">
                <img src="https://assets.ajio.com/medias/sys_master/root/20220315/Vhr5/6230b2efaeb26921afda125a/-473Wx593H-469084722-white-MODEL2.jpg" alt="T-shirt">
                <h3>T-shirt</h3>
                <span style="color: #FF0000;">$200</span>
                <span style="text-decoration:line-through">$230</span>
            </div>
            <div class="product-item-ness">
                <img src="https://product.hstatic.net/1000284478/product/b5a_umy940001_1_8e79fd54d2234f2084bb7604508ed13b_large.jpg" alt="Cardigan 2">
                <h3>Cardigan</h3>
                <span style="color: #FF0000;">$330</span>
                <span style="text-decoration:line-through">$730</span>
            </div>
        </div>
    </section>

    <?php
    print_r($data["home_data"][0]);
    foreach ($data["home_data"] as $product) {
        $product_name = $product["Product_id"];
        $product_url = $product["image_URL"];
        $product_oldprice =  $product["Old_Price"];
        $product_newprice =  $product["New_Price"];
        echo "
                <div class='product-item'>
                <img style='width: 200px;' src= $product_url alt=''>
                <p>$product_name</p>
                <span style='color: #FF0000;'>$product_newprice</span>
                <span style='text-decoration:line-through'>$product_oldprice</span>
            </div>
            ";
    }
    ?>

</body>

</html>