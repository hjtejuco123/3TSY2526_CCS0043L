<!DOCTYPE html>
<html>
<head>
    <title>Trim Whitespace</title>
</head>
<body>
    <form method="post">
        Enter a string: <input type="text" name="string"><br>
        <input type="submit" value="Trim">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Trimmed: '" . trim($_POST['string']) . "'";
    }
    ?>
</body>
</html>