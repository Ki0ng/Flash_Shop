<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./public/CSS/LogIn-Out_CSS.css">
    <title>Forgot Password</title>
</head>

<body>
    <div class="container">
        <form action="/Flash_Shop/Log_in" method="POSt">
            <div class="mb3 mt-3">
                <label for="oldPass">Curent your password</label>
                <input type="oldPass" class="form-control" name="oldPass" id="oldPass" placeholder="Enter your curent password">
            </div>
            <div class="mb3 mt-3">
                <label for="newPass">New password</label>
                <input type="newPass" class="form-control" name="newPass" id="newPass" placeholder="Enter your new password">
            </div>
            <div class="mb3 mt-3">
                <label for="confirmPass">Confirm new password</label>
                <input type="confirmPass" class="form-control" name="confirmPass" id="confirmPass" placeholder="Enter your new password again">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>

</html>