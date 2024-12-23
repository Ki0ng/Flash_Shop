<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./public/css/productFilter.css">
    <title>Products</title>
    <link rel="stylesheet" href="public/CSS/Product/Products.css">
</head>
<?php
$products = $data["data"]; 
?>
<body>
<section class="product_section">
    <form id="form_filter_product" action="" method="get">
        <div class="product_filter">
            <div class="size_selection">
                <label for="priceSelect">Price</label>
                <select id="priceSelect" class="size_btnDetail">
                    <?php 
                        if(isset($_GET['filter_price'])){
                            echo $_GET['filter_price'];
                        }
                        echo 'price'
                    ?>
                    <option value="0">0 - 100 VND</option>
                    <option value="100">100 - 300 VND</option>
                    <option value="300">300 - 500 VND</option>
                    <option value="500">500 - 1000 VND</option>
                    <option value="1000">1000 VND ></option>
                </select>
            </div>
            <div class="type_selection">
                <label for="typeSelect">Type</label>
                <select id="typeSelect" class="size_btnDetail">
                    <?php 
                        if(isset($_GET['filter_categories'])){
                            echo $_GET['filter_categories'];
                        }echo 'categories'
                    ?>
                    <option value="trousers">Trousers</option>
                    <option value="shirts">Shirts</option>
                </select>
            </div>
            <button class="button_filter" onclick="location.href='product_View.php';">FILTER</button>
        </div>
    </form>
</section>
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
