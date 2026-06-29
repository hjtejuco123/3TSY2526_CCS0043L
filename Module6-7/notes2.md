
Create a folder

htdocs/student_system/

Files inside the folder

student_system/
│── db.php
│── index.php
│── add.php
│── edit.php
│── delete.php
│── style.css
│── uploads/


SQL Database


CREATE DATABASE dbSchool;
USE dbSchool;

CREATE TABLE tblStudent (
    studentID INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    course VARCHAR(50) NOT NULL,
    yearLevel INT NOT NULL,
    photo VARCHAR(255)
);

<?php
$conn = mysqli_connect("localhost", "root", "", "dbSchool");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "dbSchool");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "dbSchool");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
