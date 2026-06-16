<?php
session_start();
$_SESSION['logged_in'] = true;
echo "User is logged in.";
?>