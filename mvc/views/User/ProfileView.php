
<?php
    $account = $data["account"];

    $email = $account['Email'];
    $name = $account['Name'];
    $phone = $account['Phone'];
    $address = $account["Address"];
    $password = $account["Password"];


    
    echo  "
        <input name = 'email'    disable  style='display:none;'  value = '$email'    id = 'origin'     >
        <input name = 'name'     disable  style='display:none;'  value = '$name'     class = 'origin'    >
        <input name = 'password' disable  style='display:none;'  value = '$password' class = 'origin'        >
        <input name = 'phone'    disable  style='display:none;'  value = '$phone'    class = 'origin'     >
        <input name = 'address'  disable  style='display:none;'  value = '$address'  class = 'origin'       >
        "
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

            <button id="edit-info" style="display: flex;" >
                <i class="fa fa-pencil fa-3x"></i>
                <strong style = "margin-left: 1rem; font-size: 1.5rem">Edit</strong>
            </button>

            <button id="cancel">
                <i class="fa fa-close fa-3x"></i>
                <strong style = "margin-left: 1rem; font-size: 1.5rem">Cancel</strong>
            </button>

            
            <form action="/Flash_Shop/Account/UpdateUser" method="post">

            <button id="save-info" disabled>
                <i class="fa fa-save fa-3x"></i>
                <strong style = "margin-left: 1rem; font-size: 1.5rem">Save</strong>
            </button>



        </center>

        </div>
        <div class="big-div">
            <i class="fa fa-user-circle-o fa-5x" style="position: absolute; top: 16rem; background: white" ></i>
            <div class="information">
                <center>
                    <div class="title">
                            <h5>Email    </h5>
                            <h5>Name     </h5>
                            <h5>Password </h5>
                            <h5>Phone    </h5>
                            <h5>Address  </h5>
                    </div>
                </center>
                <div class="value-input" id="form">

                    <?php
                         echo "
                            <input type='text' value='$email'     name='email'   readonly   id = 'show-change-' >   <br>  
                            <input type='text' value='$name'      name='name'    readonly   class = 'show-change' >    
                            <input type='text' value='$password'  name='password'    readonly   class = 'show-change'>
                            <input type='text' value='$phone'     name='phone'    readonly   class = 'show-change'  >   
                            <input type='text' value='$address'   name='address'    readonly   class = 'show-change'>
                            "
                    ?>

            </form>

                </div>
            </div>
         </div>
    </div>
    <script src="public/JS/User/Profile.js">
    </script>
</body>
</html>
