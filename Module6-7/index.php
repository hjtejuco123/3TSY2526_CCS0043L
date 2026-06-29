<?php
include "db.php";

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tblStudent 
            WHERE lastname LIKE '%$search%' 
            OR firstname LIKE '%$search%' 
            OR course LIKE '%$search%'
            ORDER BY studentID DESC";
} else {
    $sql = "SELECT * FROM tblStudent ORDER BY studentID DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Student Registration System</h1>

    <a href="add.php" class="btn">Add Student</a>

    <form method="GET" class="search-box">
        <input type="text" name="search" placeholder="Search student..." value="<?php echo $search; ?>">
        <button type="submit">Search</button>
        <a href="index.php" class="btn-secondary">Reset</a>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Course</th>
            <th>Year Level</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['studentID']; ?></td>

            <td>
                <?php if (!empty($row['photo'])) { ?>
                    <img src="uploads/<?php echo $row['photo']; ?>" class="student-img">
                <?php } else { ?>
                    No Image
                <?php } ?>
            </td>

            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['yearLevel']; ?></td>

            <td>
                <a href="edit.php?id=<?php echo $row['studentID']; ?>" class="edit">Edit</a>
                <a href="delete.php?id=<?php echo $row['studentID']; ?>" class="delete" onclick="return confirm('Delete this student?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>