<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/CSS/User/Home.css">
    <title>Wellcome To My Shop</title>
<body>
    <!--Banner-->
    <div id="demo" class="carousel slide container-lg" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./public/image/image_slide/image_slide.jpg" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="./public/image/image_slide/image_slide1.jpg" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="./public/image/image_slide/image_slide2.jpg" class="d-block" style="width:100%">
            </div>
        </div>
    </div>

    <section class="card_Outstanding container-lg">
        <div class="product-grid container-lg row">
            <?php

            for ($i = 0; $i < count($data["home_data"]); $i += 2) {

                $product = $data["home_data"][$i];

                $id = $product[0];
                $name = $product[2];
                $old_price =  $product[3];
                $new_price =  $product[4];
                $img_url = $product[6];

                echo "
        <a class='col-12 product-item' href  = 'Product/Detail/" . $id . "'style='text-decoration: none; color: black'>
        <img style='width: 200px; margin-left: -1.3rem; padding: 0px' src= $img_url alt=''  '>
        <p>$name</p>
        <span style='color: #FF0000;'>$new_price</span>
        <span style='text-decoration:line-through'>$old_price</span>
        </a>
    ";
            }
            ?>
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
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq7O9av3A-P7KCttyduz_-h6R4RjgXjY8mVQ&s" alt="Long sleeve">
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
</body>

</html>