<!DOCTYPE html>
<html>
<head>
    <title>Require vs Include</title>
</head>
<body>
    <?php
    // Using require to ensure file existence
    require('config.inc.php');
    echo "Constant loaded successfully!";
    ?>
</body>
</html>