<?php
    $categories = $data["data"]["categories"];
    $products = $data["data"]["products"];

    foreach($products as $product) {
        $product_id = $product["product_id"];
        $category_name = $product["category_name"];
        $product_name = $product["product_name"];
        $old_price = $product["old_price"];
        $new_price = $product["new_price"];
        $stock = $product["stock"];
        $image_url = $product["image_url"];
        $description = $product["description"];
        $category_id = $product["category_id"];
        
        echo "<div style= 'display: none; ' class  = 'value'>$product_id;$category_id;$old_price;$old_price;$new_price;$image_url;$image_url;$description</div>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <base href="/Flash_Shop/">
    <link rel="stylesheet" href="./public/css/Product/Products.css">
</head>
<body>
    <div class="container-lg menu-show">

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
                    echo "<option value = '{$category["category_id"]}'> {$category["category_name"]} </option> "; 
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
