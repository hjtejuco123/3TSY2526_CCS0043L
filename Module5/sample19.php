<?php
$username = "juan_123";
if (preg_match("/^\w+$/", $username)) {
    echo "Valid username.";
}
?>