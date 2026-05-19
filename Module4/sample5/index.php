<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Include Once Example</title>
</head>
<body>
    <?php
    include_once('repeated.inc.php');
    include_once('repeated.inc.php'); // This won't be included again
    ?>
</body>
</html>