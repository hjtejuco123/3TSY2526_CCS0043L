<!DOCTYPE html>
<html>
<head>
    <title>Min and Max</title>
</head>
<body>
    <form method="post">
        Enter numbers (comma-separated): <input type="text" name="numbers"><br>
        <input type="submit" value="Find Min and Max">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nums = explode(',', $_POST['numbers']);
        echo "Min: " . min($nums) . "<br>";
        echo "Max: " . max($nums);
    }
    ?>
</body>
</html>