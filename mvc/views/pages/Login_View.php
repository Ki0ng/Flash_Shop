<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./public/CSS/LogIn-Out_CSS.css">
    <title>Log_in</title>
</head>

<body>
    <div class="container mt-3">
        <h2>Sign up</h2>
        <form action="/Flash_shop/Register" method="POST">
            <div class="mb3 mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
            </div>
            <div class="mb3 mt-3">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
            </div>

            <p>
                Forgot with password
                <button type="submit" class="btn btn-primary">Submit</button>
            </p>

            <p>
                Don't have a FashShop account?
                <a href="/Flash_Shop/Register">Sign up now</a>
            </p>
        </form>
    </div>
</body>

</html>