<!DOCTYPE html>
<html>
<head>
    <title>Reverse String</title>
</head>
<body>
    <form method="post">
        Enter a string: <input type="text" name="string"><br>
        <input type="submit" value="Reverse">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Reversed: " . strrev($_POST['string']);
    }
    ?>
</body>
</html>