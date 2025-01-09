<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
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
        <h1>User Management</h1>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>User Avatar</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
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
            if (confirm("Bạn có muốn xoá sản phẩm?")) {
                alert("Xoá sản phẩm có id: " + productId);
            }
        }
    </script>
</body>

</html>
