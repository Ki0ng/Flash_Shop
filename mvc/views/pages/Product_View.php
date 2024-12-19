<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Products</title>
</head>
<style>
    .filter-container {
        background-color: #d7b1a7; /* Màu nền của khung */
        padding: 15px;
        border-radius: 5px;
        width: 10px;
        margin-left: 4rem;
    }

    .filter-section h3 {
        margin: 0 0 10px 0; /* Khoảng cách dưới tiêu đề */
        font-size: 1em;
        border-bottom: 1px solid black;
        padding-bottom: 5px;
    }

    .filter-section label {
        font-size: 0.9em;
        display: block; /* Mỗi checkbox xuống dòng */
        margin: 5px 0;
    }
    .product_filter{
        width: 200px;
        height: 320px;
        background-color:#d7b1a7;
        margin-left: 4rem;
    }
</style>
<?php
$products = $data["product_data"]; 
?>
<body>

    <form action="index.php" method="POST">
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
                            <a href="'Product/ProductDetail.php/" .$id. class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
