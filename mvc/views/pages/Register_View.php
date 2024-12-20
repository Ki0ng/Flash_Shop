<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./public/CSS/LogIn-Out_CSS.css">
    <title>Register</title>
</head>

<body>
    <div class="container mt-3">
        <h2>Sign up</h2>
        <form action="/Flash_Shop/Register/register" method="post">
            <div class="mb3 mt-3">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" required>
            </div>

            <div class="mb3 mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>

            <div class="mb3 mt-3">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" placeholder="Enter phone" name="phone" required>
            </div>

            <div class="mb3 mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="paswword" placeholder="Enter password" name="password" required>
            </div>

            <button type="submit" class="btnRegister btn-primary">Submit</button>

            <p>
                Already have a FashShop account?
                <a href="/Flash_Shop/Login">Sign in</a>
            </p>

        </form>
    </div>
</body>

</html>