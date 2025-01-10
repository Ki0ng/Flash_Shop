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
        <ul>
            <h2>Admin</h2>
            <li><a href="./Admin/"><img src="product-icon.png" alt=""> Product Management</a></li>
            <li><a href="./Admin/user_management"><img src="users-icon.png" alt=""> User Management</a></li>
        </ul>
    </div>

    <div class="main-content" style="height: 100%; overflow-y: auto;">
        <h1>User Management</h1>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data) && is_array($data) && count($data) > 0) {
                    $users = $data["data"];

                    $stt = 1;
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . $user["user_id"] . "</td>";
                        echo "<td>" . $user["user_name"] . "</td>";
                        echo "<td>" . $user["email"] . "</td>";
                        echo "<td>" . $user["phone"] . "</td>";
                        echo "<td>" . $user["address"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data</td></tr>";
                }
                ?>

            </tbody>
        </table>
</body>

</html>