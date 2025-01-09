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
    <div class="container-dasboard container-lg">
        <div class="row container-lg dasboard ">
            <div class="col-3 card"></div>
            <div class="col-3 card"></div>
            <div class="col-3 card"></div>
            <div class="col-3 card"></div>
        </div>
    </div>
</body>
</html>

<style>
    .container-dasboard {
        display: flex;
        width: 70%;
        height: 100%;
        justify-content: center;
        align-items: center;
    }

    .dasboard {
        width: 100%;            
        height: 100%;           
    }

    .dasboard >div {
        margin: 1rem;
        margin-left: 2rem;
    }


</style>