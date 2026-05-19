<!DOCTYPE html>
<html>
<head>
    <title>Unix Timestamp</title>
</head>
<body>
    <form method="post">
        Enter a date (YYYY-MM-DD): <input type="text" name="date"><br>
        <input type="submit" value="Get Timestamp">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $timestamp = strtotime($_POST['date']);
        echo "Unix Timestamp: " . $timestamp;
    }
    ?>
</body>
</html>