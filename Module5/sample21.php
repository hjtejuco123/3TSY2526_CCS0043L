<?php
$email = "student@gmail.com";
$studentID = "2024-12345";

if (preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,}$/", $email)) {
    echo "Valid email<br>";
} else {
    echo "Invalid email<br>";
}

if (preg_match("/^[0-9]{4}-[0-9]{5}$/", $studentID)) {
    echo "Valid student ID";
} else {
    echo "Invalid student ID";
}
?>