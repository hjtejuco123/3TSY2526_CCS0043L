<!DOCTYPE html>
<html>
<head>
    <title>Sort Function</title>
</head>
<body>
    <form method="post">
        Enter array elements (comma-separated): <input type="text" name="elements"><br>
        <input type="submit" value="Sort Array">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $array = explode(',', $_POST['elements']);
        sort($array);
        echo "Sorted Array: " . implode(', ', $array);
    }
    ?>
</body>
</html>