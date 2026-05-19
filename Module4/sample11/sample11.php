<!DOCTYPE html>
<html>
<head>
    <title>Explode Function</title>
</head>
<body>
    <form method="post">
        Enter comma-separated values: <input type="text" name="values"><br>
        <input type="submit" value="Explode">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $array = explode(',', $_POST['values']);
        echo "Array: " . implode(', ', $array);
    }
    ?>
</body>
</html>