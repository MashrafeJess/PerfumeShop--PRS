<?php
include "config.php";
// if(!$_SESSION)
// {
//     header('Location:http://localhost/PRS/php/login.php');
session_start();
// $id = $_SESSION["ID"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit and Rate | PerfumeShop | Products</title>
    <link rel="stylesheet" href="../CSS/front.css">
    <!-- <link href="https://fonts.googleapis.com/css2? -->
    <!-- family=Poppins:wght@300;400;500;600;700&display=swap" -->
    <!-- rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../Pictures/3547629.jpg" width="125px">
                </div>
                <nav>
                    <ul id="Menu-Items">
                        <!-- <li><a href="">Home</a></li> -->
                        <!-- <li><a href="">Products</a></li> -->
                        <!-- <li><a href="">Abouts</a></li> -->
                        <li><a class="x" href="../php/login.php">Login</a></li>
                        <li><a class="x" href="../php/myaccount.php">Account</a></li>
                    </ul>
                </nav>
                <img src="../Pictures/pexels-valeriya-965990.jpg" alt="X" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Perfume <br> Shop!</h1>
                    <p>Success isn't always about greatness. It's about consistency.Consistency<br>hard work gains success. Greatness will come.</p>
                    <a href="../php/main.php" class="btn">Explore Now &#10150;</a>
                </div>

                <div class="col-2">
                    <img src="../Pictures/v1057-logo-32.jpg" alt="A" width="300px" height="330px">
                </div>

            </div>
        </div>
    </div>

    <!-- --------------- featured categories ------------------->
    <div class="small-container">
        <div class="categories">
            <div class="row">
                <div class="col-3">
                    <!-- <img src="allpicture/category-1.jpg" alt="B"> -->
                </div>
                <div class="col-3">
                    <!-- <img src="allpicture/category-2.jpg" alt="C"> -->
                </div>
                <div class="col-3">
                    <!-- <img src="allpicture/category-3.jpg" alt="D"> -->
                </div>
            </div>
        </div>
    </div>
    <!-- --------------- featured products ------------------->
    <div class="small-container">
        <h2 class="title"></h2>
        <div class="row">
            <div class="col-4">
                <!-- <img src="allpicture/product-1.jpg" alt="E"> -->
                <!-- <h4>Eye Protection Sunglass</h4> -->
                <div class="ratings">

                </div>
                <p>$20.00</p>
            </div>
            <div class="col-4">
                <!-- <img src="allpicture/product-2.jpg" alt="F"> -->
                <!-- <h4>Eye Protection Sunglass</h4> -->

            </div>
            <div class="col-4">
                <!-- <img src="allpicture/product-3.jpg" alt="G"> -->
                <!-- <h4>Eye Protection Sunglass</h4> -->
                <div class="ratings">

                </div>
                <div class="col-4">
                    <!-- <img src="allpicture/product-4.jpg" alt="H">
                <h4>Eye Protection Sunglass</h4> -->
                </div>
            </div>
            <h2 class="title"><u>Most Selling Products</u></h2>
            <div class="row">
                <div class="col-4">
                    <img src="../Pictures/Pic6.jpg" alt="I">
                    <h4>Creed Aventus</h4>
                    <?php
                    $id = 6; // Set the product ID you want to retrieve
                    $sql = "SELECT products.Name, products.Price, AVG(review.rating) AS arating
                        FROM products
        INNER JOIN review ON products.P_id = review.P_id
        WHERE products.P_id = ?"; // Changed review.P_id to products.P_id
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $id); // Assuming $id is an integer, change the "i" if it's a different data type
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $price = $row['Price'];
                        $rating = $row['arating'];
                        echo '<h3>Rating: ' . $rating . '/5</br>
        Price: ' . $price . ' $</br></h3>';
                    } else {
                        echo "Product not found."; // Handle case where product with given ID is not found
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                    <!-- <div class="ratings">
                    //     <i class="fa fa-star" aria-hidden="true"></i>
                    //     <i class="fa fa-star" aria-hidden="true"></i>
                    //     <i class="fa fa-star" aria-hidden="true"></i>
                    //     <i class="fa fa-star" aria-hidden="true"></i>
                    //     <i class="fa fa-star-o" aria-hidden="true"></i>
                    // </div>--!>
                    
                </div>
                <div class="col-4">
                    <img src="../Pictures/Pic1.jpg" alt="J">
                    <h4>Blue De Chanel</h4>
                    <?php
                    $id = 1; // Set the product ID you want to retrieve
                    $sql = "SELECT products.Name, products.Price, AVG(review.rating) AS arating
                        FROM products
        INNER JOIN review ON products.P_id = review.P_id
        WHERE products.P_id = ?"; // Changed review.P_id to products.P_id
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $id); // Assuming $id is an integer, change the "i" if it's a different data type
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $price = $row['Price'];
                        $rating = $row['arating'];
                        echo '<h3>Rating: ' . $rating . '/5</br>
        Price: ' . $price . ' $</br></h3>';
                    } else {
                        echo "Product not found."; // Handle case where product with given ID is not found
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                    <!-- <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div> -->

                </div>
                <div class="col-4">
                    <img src="../Pictures/Pic8.jpg" alt="K">
                    <h4>Versace Eros</h4>
                    <?php
                    $id = 8; // Set the product ID you want to retrieve
                    $sql = "SELECT products.Name, products.Price, AVG(review.rating) AS arating
                        FROM products
        INNER JOIN review ON products.P_id = review.P_id
        WHERE products.P_id = ?"; // Changed review.P_id to products.P_id
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $id); // Assuming $id is an integer, change the "i" if it's a different data type
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $price = $row['Price'];
                        $rating = $row['arating'];
                        echo '<h3>Rating: ' . $rating . '/5</br>
        Price: ' . $price . ' $</br></h3>';
                    } else {
                        echo "Product not found."; // Handle case where product with given ID is not found
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                    <!-- <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </div> -->
                </div>
                <div class="col-4">
                    <img src="../Pictures/Pic3.jpg" alt="L">
                    <h4>Sauvage Dior</h4>
                    <?php
                    $id = 3; // Set the product ID you want to retrieve
                    $sql = "SELECT products.Name, products.Price, AVG(review.rating) AS arating
                        FROM products
        INNER JOIN review ON products.P_id = review.P_id
        WHERE products.P_id = ?"; // Changed review.P_id to products.P_id
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $id); // Assuming $id is an integer, change the "i" if it's a different data type
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $price = $row['Price'];
                        $rating = $row['arating'];
                        echo '<h3>Rating: ' . $rating . '/5</br>
        Price: ' . $price . ' $</br></h3>';
                    } else {
                        echo "Product not found."; // Handle case where product with given ID is not found
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                    <!-- <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <p>$20.00</p> -->
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <!-- <img src="allpicture/product-9.jpg" alt="M">
                    <h4>Eye Protection Sunglass</h4>
                    <!-- <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <p>$20.00</p> --> -->
                </div>
                <div class="col-4">
                    <!-- <img src="allpicture/product-10.jpg" alt="N">
                    <h4>Eye Protection Sunglass</h4>
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <p>$20.00</p> -->
                </div>
                <div class="col-4">
                    <!-- <img src="allpicture/product-11.jpg" alt="O">
                    <!-- <h4>Eye Protection Sunglass</h4>
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </div>
                    <p>$20.00</p> --> -->
                </div>
                <div class="col-4">
                    <!-- <img src="allpicture/product-12.jpg" alt="P">
                    <h4>Eye Protection Sunglass</h4>
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <p>$20.00</p> -->
                </div>
            </div>
        </div>
        <!----------------- offer ------------------>
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="allpicture/exclusive.png" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exlclusively Available</p>
                        <h1>Smart Band 4</h1>
                        <small>Eau de Lacoste L.12.12. Green by Lacoste Fragrances is a Citrus Aromatic fragrance for men. Eau de Lacoste L.12.12. Green was launched in 2011.</small><br>
                        <a href="" class="btn">Order Now &#10150;</a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>