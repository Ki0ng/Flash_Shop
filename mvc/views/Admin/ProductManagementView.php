<?php
$products = $data["data"];
// print_r($products);
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <link rel="stylesheet" href="./public/CSS/Admin/Admin.css">
</head>
<body>
    <div class="sidebar">
                <h2>Admin</h2>
                <ul>
                    <li><a href="./Admin/"><img src="product-icon.png" alt=""> Product Management</a></li>
            <li><a href="./Admin/UserManagement"><img src="users-icon.png" alt=""> User Management</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Product Management</h1>
        <button onclick="" class="btn btn-success" >Add</button>
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
                        <td><?= $product[0] ?></td> 
                        <td><img src="<?= $product[6] ?>" alt="Product Image"></td> 
                        <td><?= $product[2] ?></td> 
                        <td><?= $product[1] ?></td>
                        <td><?= number_format($product[4]) ?> VND</td> 
                        <td><?= $product[5] ?></td>
                        <td>
                            <button class="btn btn-danger delete" type="button" data-id="<?= $product[0] ?>">
                                <i>Delete</i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html> -->



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
                <form action="/Flash_Shop/Admin/add_product" method="POST" enctype="multipart/form-data">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="product_name" required><br><br>

                    <label for="category">Category:</label>
                    <select name="category-id" id="category">
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                    </select>

                    <label for="price">Price (VND):</label>
                    <input type="number" id="price" name="new_price" required><br><br>

                    <label for="stock">Stock Quantity:</label>
                    <input type="number" id="stock" name="stock" required><br><br>

                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="" accept="image/*"><br><br>
                    <input type="input" id="image_post" name="image_url" accept="image/*"><br><br>

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
                                <button class="btn btn-info" onclick="editProduct(<?= $product['product_id'] ?>)">Edit</button>
                                <button class="btn btn-danger delete" type="button" data-id="<?= $product["product_id"] ?>" onclick="deleteProduct(<?= $product[0] ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "flex";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        function editProduct(productId) {
            alert("Edit product with ID: " + productId);
        }

        function deleteProduct(productId) {

        }

        const image_input = document.getElementById("image");
        const image_post = document.getElementById("image_post");

        image_input.addEventListener("change", function() {

            const file = image_input.files[0];
            if (file) {
                const reader = new FileReader();

                const fileURL = URL.createObjectURL(file);

                image_post.value = fileURL;

            }
        });
    </script>
</body>

</html>