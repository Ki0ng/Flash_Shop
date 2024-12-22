<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/CSS/Authentication/Login-Register.css">
    <title>Login</title>
</head>

<body>
    <div class="container mt-3">
        <h2>Login</h2>
        <form action="User" method="POST">
            <div class="mb3 mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
            </div>
            <div class="mb3 mt-3">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
            </div>
            <p>
                <a href="User/FogotPassword">Forgot password</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </p>
            <p>
                Don't have a FashShop account?
                 <a href="User/Register">Register now</a>
            </p>
        </form>
    </div>
</body>

</html>