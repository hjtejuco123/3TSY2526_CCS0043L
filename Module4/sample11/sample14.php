<!DOCTYPE html>
<html>
<head>
    <title>Count Function</title>
</head>
<body>
    <form method="post">
        Enter array elements (comma-separated): <input type="text" name="elements"><br>
        <input type="submit" value="Count Elements">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $array = explode(',', $_POST['elements']);
        echo "Total Elements: " . count($array);
    }
    ?>
</body>
</html>