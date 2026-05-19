<!DOCTYPE html>
<html>
<head>
    <title>Random Number Generator</title>
</head>
<body>
    <form method="post">
        <input type="submit" value="Generate Random Number">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Random Number: " . rand(1, 100);
    }
    ?>
</body>
</html>