<!DOCTYPE html>
<html>
<head>
    <title>Ceiling and Floor</title>
</head>
<body>
    <form method="post">
        Enter a number: <input type="text" name="number"><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num = $_POST['number'];
        echo "Ceiling: " . ceil($num) . "<br>";
        echo "Floor: " . floor($num);
    }
    ?>
</body>
</html>