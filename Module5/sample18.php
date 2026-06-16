<?php
$number = "12345";
if (preg_match("/^[0-9]+$/", $number)) {
    echo "Numbers only.";
}
?>