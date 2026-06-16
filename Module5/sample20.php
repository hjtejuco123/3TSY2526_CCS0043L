<?php
$text = "HELLO";
if (preg_match("/hello/i", $text)) {
    echo "Case-insensitive match.";
}
?>