<?php
include "config.php";

session_start();
if (!isset($_SESSION["ename"])) {
    header("Location:http://localhost/PRS/php/login.php");
}
$id = $_SESSION["ID"];
$mail = $_SESSION["ename"];
// Assuming ID is an integer, we use "i" as the type in the bind_param function
$sql = "SELECT username FROM customers WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id); // "i" indicates integer type
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $username);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
// echo $username;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/account.css">
</head>
<div class="nav">
    <div class="info" id="d">
        <?php
        echo 'Username: ' . $username;
        echo '</br>Email: ' . $mail;
        ?>
    </div>
    <div class="lol1" id="d">Product Name</div>
    <div class="lol1" id="d">Rating By User</div>
    <?php

    $sql1 = "SELECT username, Name, rating FROM review INNER JOIN products ON review.P_id = products.P_id INNER JOIN customers ON review.C_id = customers.id WHERE id = 4";
    $result1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($result1)) {
        $name = $row['Name'];
        $rating = $row['rating'];
        echo '
    <div class="lol" id="d">
    ' . $name . '
    </div>
    <div class="lol" id="d">
    ' . $rating . '/5
    </div>
';

    }

    ?>
</div>
<div class="err">
    <a href="http://localhost/PRS/pictures/main.php"> Back To Main Page</a>
</div>
<body>

</body>

</html>