<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    echo "Welcome " . $_SESSION['username'];
    echo "<br>Account Balance: ₱50,000";
} else {
    echo "Please log in first.";
}
?>