<?php
$name = "Juan";
if (preg_match("/^[A-Za-z]+$/", $name)) {
    echo "Valid name.";
}
?>