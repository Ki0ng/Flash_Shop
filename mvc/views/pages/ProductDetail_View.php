<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/productDetail.css">
    <title>Document</title>
</head>
<?php
    // print_r($data["proDetail_data"] );
    $product = $data["proDetail_data"];
?>
<style> 
.container_proDetail {
    width: 100%;
    display: flex;
    align-items: center;
    background-color:D9D9D9; 
    padding: 50px;
    justify-content: center;
    gap:30px
}


.product_details, .product_image img {
    background-color: #fff; 
    border-radius: 10px;
}


.product_image {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
.product_image img{
    width: 100%;
    max-width: 400px;
    display: block;
    border-radius: 10px;
}
.product_details {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px;
    max-width: 250px;
}


.product_details h2 {
    font-size: 22px;
    font-weight: bold;
    margin: 0;
}


.product_details p {
    color: #555;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}
.proDetail_price {
    display: flex;
    align-items: center;
    gap: 10px;
}

.new_price {
    color: red;
    font-size: 18px;
    font-weight: bold;
}

.old_price {
    text-decoration: line-through;
    color: #888;
    font-size: 16px;
}
.size_btnDetail {
    background-color: #000;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    font-size: 12px;
}


.proDetail_quantity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.qty_btnDetail {
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 50%;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
}

.proDetail_quantity span {
    font-size: 14px;
    font-weight: bold;
}

.add_productDetail {
    background-color: #000;
    color: #fff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 12px;
    cursor: pointer;
    text-transform: uppercase;
    width: fit-content;
    margin-top: 10px;
}

.add_productDetail:hover {
    background-color: #444;
}
</style>
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