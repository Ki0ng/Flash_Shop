<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="public/CSS/Product/Detail.css">
</head>
<!-- $ct = new Cart(); -->
<?php
    // print_r($data["proDetail_data"] );
    $product = $data["proDetail_data"];
    $product_id = $product["Product_Id"];
?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $quantity= $_POST['quantity'];
        $Add_toCart = $model->add_to_cart($id, $quantity);
    }
?>
<body>
    <div class="container_proDetail">
        <div class="product_image">
            <img src="<?php echo $product["Image_URL"]?>" alt="">
        </div>
        <div class="product_details">
            <h2><?php echo $product["Product_Name"]?></h2>
            <p>
                <?php echo $product["Decription"]?>
            </p>
            <div class="proDetail_price">
                <span class="new_price"><?php echo $product["New_Price"] ?> </span>
                <span class="old_price"><?php echo $product["Old_price"] ?></span>
                <div class="size_selection">
                    <label for="sizeSelect"></label>
                    <select id="sizeSelect" class="size_btnDetail">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="SX">SX</option>
                    </select>
                </div>
            </div>
            <div class="button_productDetail">
                <?php echo "
                    <form action = 'cart/addToCart' method = 'get'>
                        <input name = 'id' value = '$product_id' class = 'd-none'>
                        <button type='submit'>Add To CartCart</button>
                    Add To Cart
                    </a>
                    </form>"?>
                <!-- <button name-product = ?= $product['Product_Id']?> class="add_to_cart">Buy Now</button>  -->
            </div>
        </div>
    </div>
    <?php 
        require_once "./mvc/views/components/Rating.php"
    ?>
</body>
</html>