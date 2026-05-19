<!DOCTYPE html>
<html>
<head>
    <title>Number Formatting</title>
</head>
<body>
    <form method="post">
        Enter a number: <input type="text" name="number"><br>
        <input type="submit" value="Format Number">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num = $_POST['number'];
        echo "Formatted: " . number_format($num, 2);
    }
    ?>
</body>
</html>