<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellcome To My Shop</title>
</head>
<body>
    <!-- Băng truyền -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./public/image/image_slide/image_slide1.jpg" alt="" class="d-block w-75 mx-auto">
            </div>
            <div class="carousel-item">
                <img src="./public/image/image_slide/image_slide2.jpg" alt="" class="d-block w-75 mx-auto">
            </div>
            <div class="carousel-item">
                <img src="./public/image/image_slide/image_slide3.jpg" alt="" class="d-block w-75 mx-auto">
            </div>
        </div>
    </div>

    <?php 
    echo $data["home_data"];
    ?>
</body>
</html>