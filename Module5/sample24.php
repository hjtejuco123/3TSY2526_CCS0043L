<?php
$password = $_POST['password'] ?? '';
if (strlen($password) < 8) {
    echo "Password must be at least 8 characters.";
}
?>