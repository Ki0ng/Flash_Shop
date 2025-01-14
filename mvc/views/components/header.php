<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/Flash_Shop/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="public/CSS/Components/Header.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light header">

        <div class="container-lg nav-home">
            <a class="navbar-logo" href="Home">
                <img src="./public/image/logo_shop.png" alt="logo" id="logo">
            </a>

            <a class="navbar-title" href="Home">
                <h2 id="title"><strong>Flash Shop</strong></h2>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-list">
                    <li class="nav-home-item">
                        <a class="nav-link active" aria-current="page" href="Home">Home</a>
                    </li>
                    <li class="nav-home-item ">
                        <a class="nav-link" href="Products">Products</a>
                    </li>
                    <li class="nav-home-item">
                        <a class="nav-link about-us" href="User/AboutUs">About Us</a>
                    </li>
                </ul>

                <li class="nav-home-item">
                    <form class="d-flex" action="Products/search" method= "get">
                        <input class="form-control me-2 search-input" name="search" type="search" placeholder="Enter Item Name" aria-label="Search" id="search-area"> <i class="fa fa-search" id="icon-search"></i>
                    </form>
                </li>

                <li class="nav-home-item" style="color: black">
                    <a class="nav-link cart fa fa-cart-arrow-down" href="Cart">

                    </a>
                </li>

                <li class="nav-home-item">
                    <a class="nav-link account fa fa-user-circle-o"  href = "User">
                    </a>
                </li>
            </div>
        </div>
    </nav>
</body>