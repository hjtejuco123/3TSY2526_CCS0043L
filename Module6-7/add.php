<?php
include "db.php";

if (isset($_POST['save'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $course = $_POST['course'];
    $yearLevel = $_POST['yearLevel'];

    $photo = "";

    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];

        move_uploaded_file($tmp_name, "uploads/" . $photo);
    }

    $sql = "INSERT INTO tblStudent 
            (lastname, firstname, course, yearLevel, photo)
            VALUES 
            ('$lastname', '$firstname', '$course', '$yearLevel', '$photo')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h1>Add Student</h1>

    <form method="POST" enctype="multipart/form-data">
        <label>Lastname</label>
        <input type="text" name="lastname" required>

        <label>Firstname</label>
        <input type="text" name="firstname" required>

        <label>Course</label>
        <input type="text" name="course" required>

        <label>Year Level</label>
        <input type="number" name="yearLevel" required>

        <label>Student Photo</label>
        <input type="file" name="photo">

        <button type="submit" name="save">Save Student</button>
        <a href="index.php" class="btn-secondary">Back</a>
    </form>
</div>

</body>
</html>