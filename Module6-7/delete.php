<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT photo FROM tblStudent WHERE studentID=$id");
$row = mysqli_fetch_assoc($result);

if (!empty($row['photo']) && file_exists("uploads/" . $row['photo'])) {
    unlink("uploads/" . $row['photo']);
}

$sql = "DELETE FROM tblStudent WHERE studentID=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>