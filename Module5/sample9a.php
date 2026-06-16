<?php
if (isset($_COOKIE["username"])) {
    echo "Cookie still exists: " . $_COOKIE["username"];
} else {
    echo "Cookie is deleted.";
}
?>