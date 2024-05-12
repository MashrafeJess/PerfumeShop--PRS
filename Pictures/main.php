<?php
include "../../PRS/php/config.php";
session_start();
if (!isset($_SESSION["ename"])) {
    header("Location:http://localhost/PRS/php/login.php");
}
$roll = $_SESSION["ID"];
// echo $roll;
// $sql = "SELECT P_id,name,price,AVG(rating) AS average_rating FROM products GROUP BY P_id";
// $result = mysqli_query($conn, $sql) or die("Error");
$sql = "SELECT products.P_id,products.pictures, products.Name, products.Price, AVG(review.rating) AS Average 
FROM products 
LEFT JOIN review ON products.P_id = review.P_id 
GROUP BY products.P_id";

$result = mysqli_query($conn, $sql);

if (isset($_POST['save'])) {
    $list = mysqli_real_escape_string($conn, $_POST['script']);
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $sql = "SELECT P_id, rating FROM review WHERE P_id = '{$product_id}' AND C_id = '{$roll}' ";
    $result = mysqli_query($conn, $sql) or die("Error in select query: " . mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        // If a row exists, update the existing record
        $sql2 = "UPDATE review SET rating = '{$list}' WHERE P_id = '{$product_id}' AND C_id = '{$roll}' ";
        $result2 = mysqli_query($conn, $sql2);
        if (!$result2) {
            die("Error in update query: " . mysqli_error($conn));
            // header("refresh: 1");
        }
    } else {
        // If no row exists, insert a new record
        $sql3 = "INSERT INTO review (C_id, P_id, rating) VALUES ('{$roll}', '{$product_id}', '{$list}')";
        $result3 = mysqli_query($conn, $sql3);
        if (!$result3) {
            die("Error in insert query: " . mysqli_error($conn));
            // header("refresh: 1");
        }
    }
    header('Location: http://localhost/PRS/pictures/main.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/main.css">
</head>

<body>
    <div class="f">
        <div class="a"><a class="z" href="../php/myaccount.php">My account</a></div>
        <div class="b"><a class="z" href="../php/logout.php">Logout</a></div>
    </div>
    <div class="nav">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['P_id'];
            $pic = $row['pictures'];
            $name = $row['Name'];
            $price = $row['Price'];
            $avg = number_format($row['Average'], 2, '.', '');

            echo '<div id="s">
                <img class ="p" src="' . $pic . '" width="250px" height="250px"></br>
                Name   : ' . $name . '</br>
                Price  : ' . $price . ' $</br>
                Rating : ' . $avg . '/5</br>
                <label>Rate:</label>
                <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                    <input name="script" list="scripts" size=10>
                    <datalist id="scripts">
                        <option value="1">
                        <option value="2">
                        <option value="3">
                        <option value="4">
                        <option value="5">
                    </datalist>
                    <input type="hidden" name="product_id" value="' . $id . '">
                    <input class="foot" type="submit" name="save" value="submit">
                </form>
            </div>';
        }
        ?>
    </div>
</body>