<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Product - Fillter
    </h1>
    <?php
        // print_r($data["filter"]);
        $product = $data["filter"];
    ?>
    <?php if (empty($filteredProducts)): ?>
        <p>No products found for the selected filter.</p>
    <?php else: ?>
        <div class="product-container">
            <?php foreach ($filteredProducts as $product): ?>
                <div class="product-card">
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p>Category: <?php echo htmlspecialchars($product['Category_Id']); ?></p>
                    <p>Price: $<?php echo htmlspecialchars($product['New_Price']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>
</html>