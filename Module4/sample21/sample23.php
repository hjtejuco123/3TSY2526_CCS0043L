<!DOCTYPE html>
<html>
<head>
    <title>Add Days to Date</title>
</head>
<body>
    <form method="post">
        Enter a date (YYYY-MM-DD): <input type="text" name="date"><br>
        Days to add: <input type="text" name="days"><br>
        <input type="submit" value="Add Days">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_date = date('Y-m-d', strtotime("+" . $_POST['days'] . " days", strtotime($_POST['date'])));
        echo "New Date: " . $new_date;
    }
    ?>
</body>
</html>