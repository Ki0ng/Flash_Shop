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
    .product_filter {
        width: 35rem;
        height: auto;
        display: flex;
        gap: 2rem;
        justify-content: flex-start;
        align-items: center;
        background-color: rgb(77, 139, 97);
        color: aliceblue;
        border-radius: 4em;
        padding: 1rem;
        margin-left: 3rem;
    }


    .size_btnDetail {
        border-radius: 4em;
        padding: 0.3rem;
    }


    .button_filter {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: rgb(54, 98, 70);
        color: aliceblue;
        border-radius: 40em;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        border: none;
    }
    .button_filter:hover {
        background-color: rgb(66, 120, 86);
    }
    .size_selection, .type_selection{
        display: flex;
        gap:1em;
    }
</style>
<?php
$products = $data["product_data"];
?>
<body>
    <section class="product_section">
        <form id="form_filter_product" action="/Flash_Shop/Product/getFilteredProducts" method="get">
            <div class="product_filter">
                <div class="size_selection">
                    <label for="priceSelect">Price</label>
                    <select id="priceSelect" name="price" class="size_btnDetail">
                        <option value="0" <?php (isset($_GET['New_Price']) == "0") ? 'selected' : '' ?>>0 - 100 VND</option>
                        <option value="100" <?php (isset($_GET['New_Price'])  == "100.000.000") ? 'selected' : '' ?>>100.000.000 VND</option>
                        <option value="300" <?php (isset($_GET['New_Price']) == "300.000.000") ? 'selected' : '' ?>>300.000.000 VND</option>
                        <option value="500" <?php (isset($_GET['New_Price'])  == "500.000.000") ? 'selected' : '' ?>>500.000.000 VND</option>
                        <option value="1000" <?php (isset($_GET['New_Price'])  == "1.000.0000.000") ? 'selected' : '' ?>>1.000.000.000 VND ></option>
                    </select>
                </div>
                
                <div class="type_selection">
                    <label for="typeSelect">Type</label>
                    <select id="typeSelect" name="category" class="size_btnDetail">
                        <option value="" <?php (!isset($_GET['Category_Id']) || $_GET['Category_Id'] == "") ? 'selected' : '' ?>>Select Type</option>
                        <option value="trousers" <?php (isset($_GET['Category_Id']) == "trousers") ? 'selected' : '' ?>>Trousers</option>
                        <option value="shirts" <?php (isset($_GET['Category_Id']) == "shirts") ? 'selected' : '' ?>>Shirts</option>
                        <option value="JEA" <?php (isset($_GET['Category_Id'])  == "JEA") ? 'selected' : '' ?>>Jeans</option>
                        <option value="Sleeve" <?php (isset($_GET['Category_Id'])  == "Sleeve") ? 'selected' : '' ?>>Sleeve</option>
                    </select>
                </div>
                <button type="submit" class="button_filter">FILTER</button>
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
                            <a href="<?php echo("Product/ProductDetail/$product_id");?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>