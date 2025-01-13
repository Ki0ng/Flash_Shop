<?php
$products = $data["data"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <link rel="stylesheet" href="./public/CSS/Admin/Admin.css">
</head>

<body>
    <div class="sidebar">
        <ul>
            <h2>Admin</h2>
            <li><a href="./Admin/"><img src="product-icon.png" alt=""> Product Management</a></li>
            <li><a href="./Admin/user_management"><img src="users-icon.png" alt=""> User Management</a></li>
        </ul>
    </div>

    <div class="main-content" style="height: 100%; overflow-y: auto;">
        <h1>Product Management</h1>

        <!-- Nút thêm sản phẩm -->
        <button onclick="openModal('addProductModal')" class="btn btn-success">Add Product</button>

        <!-- Modal cho form thêm sản phẩm -->
        <div id="addProductModal" class="modal">
            <div class="modal-content">
                <h2>Add New Product</h2>
                <form id="product" action="/Flash_Shop/Admin/add_product" method="POST" enctype="multipart/form-data">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="product_name" required><br><br>

                    <label for="category">Category:</label>
                    <select name="category_id" id="category">
                        <option value="JEA">JEA</option>
                        <option value="POL">POL</option>
                        <option value="SHI">SHI</option>
                        <option value="WAR">WAR</option>
                    </select><br><br>

                    <label for="price">Price (VND):</label>
                    <input type="number" id="price" name="new_price" required><br><br>

                    <label for="stock">Stock Quantity:</label>
                    <input type="number" id="stock" name="stock" required><br><br>

                    <label for="image">Product Image:</label>
                    <input type="input" id="image_post" name="image_url"><br><br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addProductModal')">Cancel</button>
                </form>
            </div>
        </div>

        <!-- Bảng sản phẩm -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product["product_id"] ?></td>
                            <td><img src="<?= $product["image_url"] ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                            <td><?= $product["product_name"] ?></td>
                            <td><?= $product["category_name"] ?></td>
                            <td><?= number_format($product["new_price"]) ?> VND</td>
                            <td><?= $product["stock"] ?></td>
                            <td>
                                <button class="btn btn-info" onclick="editProduct( '<?= $product['product_id'] ?>','<?= $product['product_name'] ?>', '<?= $product['category_id'] ?>', <?= $product['new_price'] ?>, <?= $product['stock'] ?>, '<?= $product['image_url'] ?>')">Edit</button>
                                <button class="btn btn-danger delete" type="button" onclick="deleteProduct(<?php echo $product['product_id'] ?> )">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="./public/JS/Admin/product.js"></script>
</body>

</html>