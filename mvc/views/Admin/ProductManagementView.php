<?php
$products = $data["products"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <link rel="stylesheet" href="./public/CSS/Admin/Admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 200px;
            background-color: #f8d7da;
            height: 100vh;
            padding: 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            background: #fff;
            border-radius: 5px;
        }

        .sidebar ul li:hover {
            background-color: #e0e0e0;
        }

        .sidebar ul li.active {
            background-color: #f5c6cb;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background: #e9ecef;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        table th,
        table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f5c6cb;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <ul>
            <h2>Admin</h2>
            <li><a href="./Admin/"><img src="product-icon.png" alt=""> Product Management</a></li>
            <li><a href="./Admin/UserManagement"><img src="users-icon.png" alt=""> User Management</a></li>
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
                    <input type="file" id="image" name="image_url" accept="image/*"><br><br>

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
                            <td><?= $product[0] ?></td>
                            <td><img src="<?= $product[6] ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                            <td><?= $product[2] ?></td>
                            <td><?= $product[1] ?></td>
                            <td><?= number_format($product[4]) ?> VND</td>
                            <td><?= $product[5] ?></td>
                            <td>
                                <button class="btn btn-info" onclick="editProduct(<?= $product[0] ?>)">Edit</button>
                                <button class="btn btn-danger delete" type="button" data-id="<?= $product[0] ?>" onclick="deleteProduct(<?= $product[0] ?>)">Delete</button>
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
    </script>
</body>

</html>