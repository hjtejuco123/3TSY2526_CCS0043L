<!DOCTYPE html>
<html>
<head>
    <title>Timestamp to Date</title>
</head>
<body>
    <form method="post">
        Enter a timestamp: <input type="text" name="timestamp"><br>
        <input type="submit" value="Convert">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Date: " . date('Y-m-d H:i:s', $_POST['timestamp']);
    }
    ?>
</body>
</html>