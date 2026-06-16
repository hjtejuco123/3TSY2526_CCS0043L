<?php
if (isset($_COOKIE["theme"])) {
    echo "Theme is: " . $_COOKIE["theme"];
} else {
    echo "Theme cookie is not set yet.";
}
?>