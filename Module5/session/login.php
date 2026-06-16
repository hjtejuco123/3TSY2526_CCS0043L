<?php
session_start();

$username = "john123";
$password = "bankpass";

if ($_POST['username'] == $username &&
    $_POST['password'] == $password) {

    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;

    echo "Login successful!";
}
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>