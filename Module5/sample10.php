<?php
if (isset($_POST['remember'])) {
    setcookie("username", $_POST['username'], time() + (86400 * 30)); // 30 days
}

echo "Login successful.";
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    <input type="checkbox" name="remember"> Remember Me<br>
    <input type="submit" value="Login">
</form>