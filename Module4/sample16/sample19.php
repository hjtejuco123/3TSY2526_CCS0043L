<!DOCTYPE html>
<html>
<head>
    <title>Substring Extraction</title>
</head>
<body>
    <form method="post">
        Enter a string: <input type="text" name="string"><br>
        Start position: <input type="text" name="start"><br>
        Length: <input type="text" name="length"><br>
        <input type="submit" value="Extract Substring">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Substring: " . substr($_POST['string'], $_POST['start'], $_POST['length']);
    }
    ?>
</body>
</html>