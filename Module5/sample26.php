<?php
$input = htmlspecialchars($_POST['comment'] ?? '');
echo "Safe comment: " . $input;
?>