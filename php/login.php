<?php
include "config.php";
// echo "<h1 class=\"err\">Passwords doesn't match</h1>";
session_start();
if (isset($_POST['save'])) {
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
    $sql = "SELECT id,email FROM customers WHERE email = '{$mail}' AND pass = '{$pass}'";
    // $sql1 = "SELECT id FROM customers WHERE pass = cpass";
    // $result1 = mysqli_query($conn, $sql1);
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // session_start();
            $_SESSION["ename"] = $row['email'];
            $_SESSION["ID"] = $row['id'];

            header("Location:http://localhost/PRS/Pictures/main.php");
            exit;
        }
    } else {
        $error = "Username not found";
    }
}
// echo "<h1>{$_SESSION["ID"]}</h1>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>login</title>
</head>

<body>
    <div class="container">

        <div class="k">
            <img src="../Pictures/3547629.jpg" alt="A" height="100px" width="100px"></br>
            Login here!!!
        </div>
        <div class="l">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <label><b>Email</b></label></br>
                <input class="ino" type="email" name="mail" placeholder="Enter your email address" required> </br>
                <label><b>Password</b></label></br>
                <input class="ino" type="password" name="pass" placeholder="Enter your password" required> </br>
                <input class="sub" type="submit" name="save" value="submit">
            </form>
        </div>
    </div>
</body>

</html>
<?php if (isset($error)) {
    echo "<h1 class=\"err\">$error</h1>";
}
?>