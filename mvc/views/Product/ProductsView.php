<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="public/CSS/Product/Products.css">
</head>
<?php
$products = $data["data"]; 
?>
<body>
    <form action="Product_View.php" method="POST">
        <div class="product_filter"> 
            <!-- Price Section -->
            <div>
                <h3>Price</h3>
                <label><input type="checkbox" name="price[]" value="0-100"> 0 - 100</label><br>
                <label><input type="checkbox" name="price[]" value="100-300"> 100 - 300</label><br>
                <label><input type="checkbox" name="price[]" value="300-500"> 300 - 500</label><br>
                <label><input type="checkbox" name="price[]" value="500-1000"> 500 - 1000</label><br>
                <label><input type="checkbox" name="price[]" value="1000+"> 1000 ></label>
            </div>
            <!-- Type Section -->
            <div>
                <h3>Type</h3>
                <label><input type="checkbox" name="type[]" value="trousers"> Trousers</label><br>
                <label><input type="checkbox" name="type[]" value="shirts"> Shirts</label>
            </div>
            <button type="submit">Filter</button>
        </div>
    </form>
    <div class="container">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <?php 
                    $product_name = $product[2];
                    $product_id = $product[0];
                    $product_old_price = $product[3];
                    $product_new_price = $product[4];
                    $product_url = $product[6];
                    $product_dec  = $product[7];
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="<?php echo $product_url; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product_name; ?></h5>
                            <p class="card-text"><?php echo $product_dec; ?></p>
                            <p class="card-text">
                                <span style="color: #FF0000;"><?php echo number_format($product_new_price, 0, ',', '.'); ?> VNĐ</span>
                                <span style="text-decoration: line-through;"><?php echo number_format($product_old_price, 0, ',', '.'); ?> VNĐ</span>
                            </p>
                            <?php echo "<a href='Product/Detail/$product_id' class='btn btn-primary'>View Details</a>"?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
