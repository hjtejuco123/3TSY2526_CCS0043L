<?php
$age = $_POST['age'] ?? '';
if (!is_numeric($age)) {
    echo "Age must be a number.";
}
?>