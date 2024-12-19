<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="Flash_Shop/">
</head>
<style>
    .menu-account {
        display: grid;
        grid-template-columns: 25% 75%;
        margin-top: 10px;
        margin-bottom: 10px;
        border: 1px solid #000;
}
.small-div {
    height: 35rem;
    border: 1px solid #000;
}

.big-div{
    border: 5px solid #000;
    display: flex;
    justify-content: center;
    align-items: center;
}
.information {
    height: 25rem;
    width: 80%;
    border: 1px solid #000;
    display: grid;
    grid-template-columns: 40% 60%;
}
.title>h4,  .value-input>input{
    margin-top: 2.5rem;
}

.value-input>input {
    width: 70%;
}

/* .value-input>button {
    height: 1rem;
} */

</style>

<body>
    <div class="container-lg menu-account">
        <div class="small-div">
            <ul>
                <li>MY ACCOUNT</li>
                <li>Profile</li>
                <li>Change Password</li>
                <li>Address</li>
            </ul>
            <ul>
                <li>MY ACCOUNT</li>
                <li>Profile</li>
                <li>Change Password</li>
                <li>Address</li>
            </ul>            <ul>
                <li>MY ACCOUNT</li>
                <li>Profile</li>
                <li>Change Password</li>
                <li>Address</li>
            </ul>
        </div>
        <div class="big-div">
            <div class="information">
                <center>
                    <div class="title">
                            <h4>Email    </h4>
                            <h4>Name     </h4>
                            <h4>Password </h4>
                            <h4>Phone    </h4>
                            <h4>Address  </h4>
                    </div>
                </center>
                <div class="value-input">
                            <input type="text"> <button class="fa fa-pencil fa-2"></button>
                            <br>
                            <input type="text"> <button class="fa fa-pencil fa-2"></button>
                            <br>
                            <input type="text"> <button class="fa fa-pencil fa-2"></button>
                            <br>
                            <input type="text"> <button class="fa fa-pencil fa-2"></button>
                            <br>
                            <input type="text"> <button class="fa fa-pencil fa-2"></button>

                
                </div>
            </div>
         </div>
    </div>
</body>
</html>