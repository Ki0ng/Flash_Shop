<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>

    <link rel="stylesheet" href="./public/CSS/components/Header.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./public/CSS/Components/Rating.css">
</head>
<body>
<center>

    <form action="Rating" id="rating" class="row container-lg form-ctn" >
            <textarea name="comment" class="rating-comment container-md"  id="comment" placeholder="How do you feel our product?" required> </textarea>
                    <input name="star" class="d-none rating-star" required>
            <div class="col-7 rating-star-ctn container-md">
                <div class="d-flex container-md star-ctn">
                    <div class="col fa fa-star rating-star fa-2x"></div>
                    <div class="col fa fa-star rating-star fa-2x"></div>
                    <div class="col fa fa-star rating-star fa-2x"></div>
                    <div class="col fa fa-star rating-star fa-2x"></div>
                    <div class="col fa fa-star rating-star fa-2x"></div>
                </div>
                <button class="btn btn-lg btn-submit-rating col-4" type="submit">Send</button>
            </div>
    </form>
    </center>
    <script src="./public/JS/components/Rating.js">
    </script>
</body>