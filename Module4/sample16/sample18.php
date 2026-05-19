<!DOCTYPE html>
<html>
<head>
    <title>Uppercase and Lowercase</title>
</head>
<body>
    <form method="post">
        Enter a string: <input type="text" name="string"><br>
        <input type="submit" value="Convert Case">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Uppercase: " . strtoupper($_POST['string']) . "<br>";
        echo "Lowercase: " . strtolower($_POST['string']);
    }
    ?>
</body>
</html>