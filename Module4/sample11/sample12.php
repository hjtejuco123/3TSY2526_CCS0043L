<!DOCTYPE html>
<html>
<head>
    <title>Implode Function</title>
</head>
<body>
    <form method="post">
        Enter array elements (comma-separated): <input type="text" name="elements"><br>
        <input type="submit" value="Implode">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $array = explode(',', $_POST['elements']);
        echo "String: " . implode(' | ', $array);
    }
    ?>
</body>
</html>