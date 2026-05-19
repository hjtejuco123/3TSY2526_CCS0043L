<!DOCTYPE html>
<html>
<head>
    <title>String Length</title>
</head>
<body>
    <form method="post">
        Enter a string: <input type="text" name="string"><br>
        <input type="submit" value="Get Length">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Length: " . strlen($_POST['string']);
    }
    ?>
</body>
</html>