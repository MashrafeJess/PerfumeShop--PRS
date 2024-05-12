<?php
include "config.php";
// echo "<h1 class=\"err\">Passwords doesn't match</h1>";
if (isset($_POST['save'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpass']));
    $sql = "SELECT email FROM customers WHERE email = '{$mail}'";
    // $sql1 = "SELECT id FROM customers WHERE pass = cpass";
    // $result1 = mysqli_query($conn, $sql1);
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $msg3 = "Email already taken";
    } else if ($pass != $cpass) {
        $msg1 = "Passwords doesn't match";
    } else {
        $sql2 = "INSERT INTO customers (username,email,pass,cpass) VALUES ('{$username}','{$mail}',
        '{$pass}','{$cpass}')";
        if (mysqli_query($conn, $sql2)) {
            echo "Success";
            header("Location:http://localhost/PRS/php/login.php");
        } else {
            echo "Failed";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/register.css">
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <div class="k">
            <img src="../Pictures/3547629.jpg" alt="A" height="150px" width="150px"></br>
            Register Please!!!
        </div>
        <div class="l">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <label><b>Username </b></label></br>
                <input class="ino" type="text" name="name" placeholder="Enter your username"> </br>
                <label><b>Email</b></label></br>
                <input class="ino" type="email" name="mail" placeholder="Enter your email address" required> </br>
                <label><b>Password</b></label></br>
                <input class="ino" type="password" name="pass" placeholder="Enter your password" required> </br>
                <label><b>Confirm Password</b></label></br>
                <input class="ino" type="password" name="cpass" placeholder="Enter your password again" required> </br>
                <input class="sub" type="submit" name="save" value="submit">
            </form>
        </div>
    </div>
    <?php
    if (isset($msg1)) {
        echo '<h1 class="err"> ' . $msg1 . ' </h1>';
    } else if (isset($msg2)) {
        echo '<h1 class="err"> ' . $msg2 . ' </h1>';
    } else if (isset($msg3)) {
        echo '<h1 class="err"> ' . $msg3 . ' </h1>';
    }
    ?>
</body>

</html>