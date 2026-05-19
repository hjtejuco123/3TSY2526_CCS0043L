<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Constants</title>
</head>
<body>
    <form method="post">
        Enter a site name: <input type="text" name="site_name"><br>
        <input type="submit" value="Set Constant">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        define('SITE_NAME', $_POST['site_name']);
        echo "Your site name is: " . SITE_NAME;
    }
    ?>
</body>
</html>