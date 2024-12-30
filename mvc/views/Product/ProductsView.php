<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <base href="/Flash_Shop/">
    <link rel="stylesheet" href="public/CSS/Product/Products.css">
</head>
<?php

    $categories = $data["categories"];
    $products = $data["data"];
    foreach($products as $product) {
        echo "<div style= 'display: none; ' class  = 'value'>$product[0];$product[1];$product[2];$product[3];$product[4];$product[5];$product[6];$product[7]</div>";
    }
?>
<body>
    <div class="container-lg menu-show"x>

        <label for="price">Price</label>
        <select name="Price" id="filterByPrice">
            <option value="0">Select</option>
            <option value="1">Less 100.000 </option>
            <option value="2">100.000 - 300.000</option>
            <option value="3">300.000 - 500.000</option>
            <option value="4">500.000 - 1.000.000</option>
            <option value="5">More 1.000.000</option>
        </select>

        <label for="type">Type</label>
        <select name="type" id="filterByType">
            <option value="all">All</option>
            <?php
                foreach($categories as $category) {
                    echo "<option value = '$category[0]'> $category[1] </option> "; 
                }
            ?>
        </select>
        <label for="sort">Sort</label>
        <select name="sort" id="sortByPrice">
            <option value="none">Select</option>
            <option value="lowToHigh">Low -> High</option>
            <option value="highToLow">High -> Low</option>
        </select>
    </div>
    <div class="container">
        <div class="row" id="display">
        </div>
    </div>
    <script src ="public/JS/Product/Products.js"> </script>
</body> 

</html>
