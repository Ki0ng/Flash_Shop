<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
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
