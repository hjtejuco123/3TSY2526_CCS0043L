<!DOCTYPE html>
<html>
<head>
    <title>Unset Function</title>
</head>
<body>
    <form method="post">
        Enter array elements (comma-separated): <input type="text" name="elements"><br>
        <input type="submit" value="Unset First Element">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $array = explode(',', $_POST['elements']);
        unset($array[0]);
        echo "Modified Array: " . implode(', ', $array);
    }
    ?>
</body>
</html>