<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "student01" && $password == "pass123") {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;

        echo "Login successful. Welcome, " . $_SESSION["username"];
    } else {
        echo "Invalid username or password.";
    }
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>