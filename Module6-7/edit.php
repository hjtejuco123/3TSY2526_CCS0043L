<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tblStudent WHERE studentID=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $course = $_POST['course'];
    $yearLevel = $_POST['yearLevel'];

    $photo = $row['photo'];

    if (!empty($_FILES['photo']['name'])) {
        if (!empty($photo) && file_exists("uploads/" . $photo)) {
            unlink("uploads/" . $photo);
        }

        $photo = time() . "_" . $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];

        move_uploaded_file($tmp_name, "uploads/" . $photo);
    }

    $sql = "UPDATE tblStudent SET
            lastname='$lastname',
            firstname='$firstname',
            course='$course',
            yearLevel='$yearLevel',
            photo='$photo'
            WHERE studentID=$id";

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
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h1>Edit Student</h1>

    <form method="POST" enctype="multipart/form-data">
        <label>Lastname</label>
        <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" required>

        <label>Firstname</label>
        <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" required>

        <label>Course</label>
        <input type="text" name="course" value="<?php echo $row['course']; ?>" required>

        <label>Year Level</label>
        <input type="number" name="yearLevel" value="<?php echo $row['yearLevel']; ?>" required>

        <label>Current Photo</label><br>

        <?php if (!empty($row['photo'])) { ?>
            <img src="uploads/<?php echo $row['photo']; ?>" class="preview-img">
        <?php } else { ?>
            <p>No image uploaded</p>
        <?php } ?>

        <label>Change Photo</label>
        <input type="file" name="photo">

        <button type="submit" name="update">Update Student</button>
        <a href="index.php" class="btn-secondary">Back</a>
    </form>
</div>

</body>
</html>