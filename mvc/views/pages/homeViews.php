<?php
include_once '../controllers/ProductController.php'; // Chú ý đường dẫn

// Khởi tạo Controller
$productController = new ProductController();
$products = $productController->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Shop</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product-list { display: flex; flex-wrap: wrap; gap: 20px; }
        .product-card { border: 1px solid #ccc; padding: 10px; width: 200px; text-align: center; }
        .product-card img { max-width: 100%; height: auto; }
        .product-card h3 { font-size: 18px; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Flash Shop - Product List</h1>
    <div class="product-list">
        <?php
        if ($products->num_rows > 0) {
            while ($product = $products->fetch_assoc()) {
                echo "
                <div class='product-card'>
                    <img src='{$product['image_url']}' alt='{$product['name']}'>
                    <h3>{$product['name']}</h3>
                    <p>Price: \${$product['price']}</p>
                </div>
                ";
            }
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    </div>
</body>
</html>

