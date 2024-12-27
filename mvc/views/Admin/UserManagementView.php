<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
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
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar ul li:hover {
            background-color: #e0b3b3;
        }

        .sidebar ul li img {
            width: 20px;
            height: 20px;
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
            border-radius: 5px;
            overflow: hidden;
            text-align: left;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .status {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .status span {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 12px;
        }

        .active {
            background-color: green;
        }

        .inactive {
            background-color: orange;
        }

        .banned {
            background-color: red;
        }

        /* Dropdown styling */
        .status-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            padding: 5px 0;
        }

        .status-dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-radius: 5px;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
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
                <tr>
                    <td>1</td>
                    <td><img src="user1.jpg" alt="" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                    <td>JohnDoe</td>
                    <td>johndoe@example.com</td>
                    <td class="status">
                        <div class="status-dropdown">
                            <span class="active">Active</span>
                            <div class="dropdown-content">
                                <a href="#" class="status-option" data-status="active">Active</a>
                                <a href="#" class="status-option" data-status="inactive">Inactive</a>
                                <a href="#" class="status-option" data-status="banned">Banned</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="user2.jpg" alt="" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                    <td>JaneSmith</td>
                    <td>janesmith@example.com</td>
                    <td class="status">
                        <div class="status-dropdown">
                            <span class="inactive">Inactive</span>
                            <div class="dropdown-content">
                                <a href="#" class="status-option" data-status="active">Active</a>
                                <a href="#" class="status-option" data-status="inactive">Inactive</a>
                                <a href="#" class="status-option" data-status="banned">Banned</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="user3.jpg" alt="" style="width: 50px; height: 50px; border-radius: 50%;"></td>
                    <td>BobBrown</td>
                    <td>bobbrown@example.com</td>
                    <td class="status">
                        <div class="status-dropdown">
                            <span class="banned">Banned</span>
                            <div class="dropdown-content">
                                <a href="#" class="status-option" data-status="active">Active</a>
                                <a href="#" class="status-option" data-status="inactive">Inactive</a>
                                <a href="#" class="status-option" data-status="banned">Banned</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
