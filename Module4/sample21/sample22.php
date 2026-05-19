<!DOCTYPE html>
<html>
<head>
    <title>Leap Year Checker</title>
</head>
<body>
    <form method="post">
        Enter a year: <input type="text" name="year"><br>
        <input type="submit" value="Check Leap Year">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $is_leap = date('L', strtotime($_POST['year'] . '-01-01'));
        echo ($is_leap ? "Leap Year" : "Not a Leap Year");
    }
    ?>
</body>
</html>