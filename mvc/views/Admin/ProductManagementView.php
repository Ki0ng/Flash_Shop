<?php
require_once './mvc/models/ProductModel.php';

$productModel = new ProductModel();
$products = $productModel->products();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 250px;
            background-color: #f4c5c5;
            padding: 10px;
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            margin: 10px 0;
            background-color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #e0b3b3;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            width: 50px;
            height: 50px;
        }
    </style>
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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($products): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product[0] ?></td> <!-- ID sản phẩm -->
                        <td><img src="<?= $product[6] ?>" alt="Product Image"></td> <!-- Hình ảnh sản phẩm -->
                        <td><?= $product[2] ?></td> <!-- Tên sản phẩm -->
                        <td><?= $product[1] ?></td> <!-- Mã danh mục -->
                        <td><?= number_format($product[4]) ?> VND</td> <!-- Giá mới -->
                        <td><?= $product[5] ?></td> <!-- Số lượng trong kho -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
</body>
</html>
