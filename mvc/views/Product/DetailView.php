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
    $product = $data["data"];
    $product_id = $product[0]["product_id"];
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
            <img src="<?php echo $product[0]["image_url"]?>" alt="">
        </div>
        <div class="product_details">
            <h2><?php echo $product[0]["product_name"]?></h2>
            <p>
                <?php echo $product[0]["description"]?>
            </p>
            <div class="proDetail_price">
                <span class="new_price"><?php echo $product[0]["new_price"] ?> </span>
                <span class="old_price"><?php echo $product[0]["old_price"] ?></span>
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
                        <input name = 'product_id' value = '$product_id' class = 'd-none'>
                        <input name = 'price' value = '{$product[0]['new_price']}' class = 'd-none'>
                        <input name = 'value' value = '1' class = 'd-none'>
                        <button type='submit'>Add To Cart</button>
                    </a>
                    </form>"?>
            </div>
        </div>
    </div>
    <?php 
        require_once "./mvc/views/components/Rating.php"
    ?>
</body>
</html>