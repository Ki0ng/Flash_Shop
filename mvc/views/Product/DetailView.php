<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="public/CSS/Product/Detail.css">
</head>
<?php
    // print_r($data["proDetail_data"] );
    $product = $data["proDetail_data"];
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
            <div class="proDetail_quantity">
                <button class="qty_btnDetail" id="decreaseBtn">−</button>
                <span id="quantity">1</span>
                <button class="qty_btnDetail" id="increaseBtn">+</button>
            </div>
            <button class="add_productDetail">Add Product</button>
        </div>
    </div>

    <?php 
        require_once "./mvc/views/components/Rating.php"
    ?>
    <script src="./public/JS/productDetail.js"></script>

</body>
</html>