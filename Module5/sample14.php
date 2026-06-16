<?php
session_start();
unset($_SESSION['name']);
echo "Name session removed.";
?>