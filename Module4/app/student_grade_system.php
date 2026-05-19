<?php include('header.inc.php'); ?>

<h2>Student Grade System</h2>
<form method="post">
    Enter student name: <input type="text" name="name"><br>
    Enter grades (comma-separated): <input type="text" name="grades"><br>
    <input type="submit" value="Calculate Grades">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $grades = explode(',', $_POST['grades']);
    $average = array_sum($grades) / count($grades);

    echo "<h3>Results for $name:</h3>";
    echo "Grades: " . implode(', ', $grades) . "<br>";
    echo "Average: " . number_format($average, 2) . "<br>";
    echo "Letter Grade: " . ($average >= 90 ? 'A' : ($average >= 75 ? 'B' : 'C'));
}
?>
<br><br>
<a href="index.php">← Back to Main Menu</a>
<?php include('footer.inc.php'); ?>