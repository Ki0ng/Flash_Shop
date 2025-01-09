<?php
$products = $data["data"];
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
                        <td><?= $product["product_id"] ?></td> 
                        <td><img src="<?= $product["image_url"] ?>" alt="Product Image"></td> 
                        <td><?= $product["product_name"] ?></td> 
                        <td><?= $product["category_id"] ?></td>
                        <td><?= number_format($product["new_price"]) ?> VND</td> 
                        <td><?= $product["stock"] ?></td>
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
        <h2>Admin</h2>
        <ul>
            <li><a href="./Admin/"><img src="product-icon.png" alt=""> Product Management</a></li>
            <li><a href="./Admin/UserManagement"><img src="users-icon.png" alt=""> User Management</a></li>
        </ul>
    </div>
    <div class="content" style="height: 100%; overflow-y: auto;">
        <h1>Product Management</h1>

        <!-- Nút thêm sản phẩm -->
        <button onclick="openModal('addProductModal')" class="btn btn-success">Add Product</button>

        <!-- Modal cho form thêm sản phẩm -->
        <div id="addProductModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('addProductModal')">&times;</span>
                <h2>Add New Product</h2>
                <form action="/Flash_Shop/Admin/AddProduct" method="POST" enctype="multipart/form-data">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="product_name" required><br><br>

                    <label for="category">Category:</label>
                    <input type="text" id="category" name="category_id" required><br><br>

                    <label for="price">Price (VND):</label>
                    <input type="number" id="price" name="price" required><br><br>

                    <label for="stock">Stock Quantity:</label>
                    <input type="number" id="stock" name="stock" required><br><br>

                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="image_url" accept="image/*"  value="http://google.com"><br><br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addProductModal')">Cancel</button>
                </form>
            </div>
        </div>

        <!-- Modal cho form chỉnh sửa sản phẩm -->
        <div id="editProductModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('editProductModal')">&times;</span>
                <h2>Edit Product</h2>
                <form action="/Flash_Shop/Admin/ProductManagementView" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="editProductId" name="editProductId">
                    <label for="editProductName">Product Name:</label>
                    <input type="text" id="editProductName" name="editProductName" required><br><br>

                    <label for="editCategory">Category:</label>
                    <input type="text" id="editCategory" name="editCategory" required><br><br>

                    <label for="editPrice">Price (VND):</label>
                    <input type="number" id="editPrice" name="editPrice" required><br><br>

                    <label for="editStock">Stock Quantity:</label>
                    <input type="number" id="editStock" name="editStock" required><br><br>

                    <label for="editImage">Product Image:</label>
                    <input type="file" id="editImage" name="editImage" accept="image/*"><br><br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onclick="closeModal('editProductModal')">Cancel</button>
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
                            <td><?= $product["category_id"] ?></td>
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
        // Hàm mở modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "flex";
        }

        // Hàm đóng modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Hàm chỉnh sửa sản phẩm
        function editProduct(productId) {
            const product = <?php echo json_encode($products); ?>.find(item => item[0] == productId);

            // Cập nhật thông tin vào form chỉnh sửa
            document.getElementById("editProductId").value = product[0];
            document.getElementById("editProductName").value = product[2];
            document.getElementById("editCategory").value = product[1];
            document.getElementById("editPrice").value = product[4];
            document.getElementById("editStock").value = product[5];

            // Hiển thị modal chỉnh sửa
            openModal('editProductModal');
        }

        // Hàm xóa sản phẩm
        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                window.location.href = "delete_product.php?id=" + productId;
            }
        }
    </script>
</body>

</html>