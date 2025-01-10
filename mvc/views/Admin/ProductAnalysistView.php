<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
    <link rel="stylesheet" href="./public/CSS/Admin/ProductAnalysist.css">
</head>

<body>
    <nav class="sidebar">
        <h2>Admin</h2>
            <div><a href="./Admin/">Product Management</a></div>
            <div><a href="./Admin/UserManagement">User Management</a></div>
    </nav>
    <div class="row screen">

        <?php
            if ($data["data"]) {
                foreach ($data["data"] as $category) {

                    echo "<div>";
                    echo "<div class='col-8 card'  >";
                    echo "<center>";
                    echo "<h2 class= 'category-name' >" . $category["category_name"] . "</h2>";
                    echo "<div class = 'has-stock'> ";
                    echo "<h4 class='has' style='font-size: 1.5vw'>" . $category["stock"] . "</h4>";
                    echo "<h3 class='' style='font-size: 1.7vw'>/</h3>";
                    echo "<h3 class='stock' style='font-size: 1.7vw'>" . $category["stock"] . "</h3>";
                    echo "</div>";
                    echo "<p class='info' style='font-size: 1.5vw;'>...</p>";
                    echo "<h4 class='sold' style='font-size: 1.5vw'>" . "100000" . "</h4>";
                    echo "</center>";
                    echo "</div>";
                    echo "</div>";
                }
            }

        ?>

   
            
    </div>



    <script src="./public/JS/Admin/ProductAnalysist.js"></script>
</body>
</html>
