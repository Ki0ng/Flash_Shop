<?php

    $account = $data["data"][0];

    $email = $account['email'];
    $name = $account['user_name'];
    $phone = $account['phone'];
    $address = $account["address"];

    $password = $_SESSION["password"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <base href="/Flash_Shop/">
    <link rel="stylesheet" href="public/CSS/User/Profile.css">
</head>

<body>
    <div class="container-lg menu-account">
        <div class="small-div">
            <center>
                <h3 style="margin-top: 1.5rem; margin-bottom: 3rem"> MY ACCOUNT</h3>

                <button id="logout" style="display: flex;">
                    <i class="fa fa-sign-out fa-3x"></i>
                    <strong style="margin-left: 1rem; font-size: 1.5rem">Log Out</strong>
                </button>

                <button id="edit-info" style="display: flex;">
                    <i class="fa fa-pencil fa-3x"></i>
                    <strong style="margin-left: 1rem; font-size: 1.5rem">Edit</strong>
                </button>

                <button id="cancel">
                    <i class="fa fa-close fa-3x"></i>
                    <strong style="margin-left: 1rem; font-size: 1.5rem">Cancel</strong>
                </button>

                <form action="/Flash_Shop/User/update" method="post">

                    <?php
                    echo  "
                            <input  name = 'email'     style = 'display: none'   value = '$email'        id    = 'form_post'>
                            <input  name = 'name'      style = 'display: none'   value = '$name'         class = 'form_post'>
                            <input  name = 'password'  style = 'display: none'   value = '$password'     class = 'form_post'>
                            <input  name = 'phone'     style = 'display: none'   value = '$phone'        class = 'form_post'>
                            <input  name = 'address'   style = 'display: none'   value = '$address'      class = 'form_post'>
                        "
                    ?>
                    <button id="save-info" disabled>
                        <i class="fa fa-save fa-3x"></i>
                        <strong style="margin-left: 1rem; font-size: 1.5rem">Save</strong>
                    </button>

                </form>
            </center>
        </div>
        <div class="big-div">
            <i class="fa fa-user-circle-o fa-5x icon-user"></i>
            <div class="information">
                <center>
                    <div class="title">
                        <h5>Email </h5>
                        <h5>Name </h5>
                        <h5>Password </h5>
                        <h5>Phone </h5>
                        <h5>Address </h5>
                    </div>
                </center>
                <div class="value-input" id="form">
                    <?php
                    echo "
                            <input   type='text'     value='$email'      name='email'        readonly   id    = 'form_show'      >   <br>  
                            <input   type='text'     value='$name'       name='name'         readonly   class = 'form_show'    >    
                            <input   type='text'     value='$password'   name='password'     readonly   class = 'form_show'    >
                            <input   type='text'     value='$phone'      name='phone'        readonly   class = 'form_show'    >   
                            <input   type='text'     value='$address'    name='address'      readonly   class = 'form_show'    >
                        "
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="public/JS/User/Profile.js">
    </script>


    <div id="notification" class="container-md card">

    </div>
</body>

</html>