<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="/Flash_Shop/">
    <link rel="stylesheet" href="public/CSS/Account_Profile.css">
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

            <button id="save-info">
                <i class="fa fa-save fa-3x"></i>
                <strong style = "margin-left: 1rem; font-size: 1.5rem">Save</strong>
            </button>

            <button id="cancel">
                <i class="fa fa-close fa-3x"></i>
                <strong style = "margin-left: 1rem; font-size: 1.5rem">Cancel</strong>
            </button>
            

            <button id="success-change">
                <i class="fa fa-check-square-o fa-3x"></i>
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
                        $account = $data["account"];
                        $account_email = $account['Email'];
                        $account_name = $account['Name'];
                        $account_id = $account['User_Id'];
                        $account_phone = $account['Phone'];
                        $account_address = $account["Address"];
                        $account_password = $account["Password"];

                        echo "
                            <input type='text' value=' $account_email ' disabled id='account-email' >   <br>  
                            <input type='text' value=' $account_name 'readonly class='component' id='account-name'>    
                            <input type='text' value=' $account_password ' readonly class='component' id='account-password'>
                            <input type='text' value=' $account_phone ' readonly class='component' id='account-phone'>   
                            <input type='text' value=' $account_address 'readonly class='component' id='account-address'>
                            "
                            ?>
                </div>
            </div>
         </div>
    </div>
    <script src="public/JS/Account_Profile.js">
    </script>
</body>
</html>
