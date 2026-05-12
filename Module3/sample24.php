<?php
// Program that creates and manages a multidimensional array of student grades
echo "<h2>Student Grade Management System</h2>";

// Initialize students array if not set
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [
        ['id' => 1, 'name' => 'John Doe', 'grades' => [85, 90, 78]],
        ['id' => 2, 'name' => 'Jane Smith', 'grades' => [92, 88, 95]],
        ['id' => 3, 'name' => 'Bob Johnson', 'grades' => [76, 82, 80]]
    ];
}

// Handle form submissions
if (isset($_POST['add_student'])) {
    $name = trim($_POST['name']);
    $grades = [];
    
    // Get grades from form
    for ($i = 1; $i <= 3; $i++) {
        if (isset($_POST["grade$i"]) && is_numeric($_POST["grade$i"])) {
            $grades[] = floatval($_POST["grade$i"]);
        }
    }
    
    if (!empty($name) && !empty($grades)) {
        $newId = end($_SESSION['students'])['id'] + 1;
        $_SESSION['students'][] = [
            'id' => $newId,
            'name' => $name,
            'grades' => $grades
        ];
    }
}

if (isset($_POST['delete_student'])) {
    $idToDelete = intval($_POST['student_id']);
    foreach ($_SESSION['students'] as $key => $student) {
        if ($student['id'] == $idToDelete) {
            unset($_SESSION['students'][$key]);
            $_SESSION['students'] = array_values($_SESSION['students']);
            break;
        }
    }
}

// Display student data
echo "<h3>Current Students:</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Name</th><th>Grades</th><th>Average</th><th>Action</th></tr>";

foreach ($_SESSION['students'] as $student) {
    // Calculate average grade
    $average = array_sum($student['grades']) / count($student['grades']);
    
    echo "<tr>";
    echo "<td>{$student['id']}</td>";
    echo "<td>{$student['name']}</td>";
    echo "<td>" . implode(', ', $student['grades']) . "</td>";
    echo "<td>" . number_format($average, 2) . "</td>";
    echo "<td>
            <form method='post' style='display:inline;'>
                <input type='hidden' name='student_id' value='{$student['id']}'>
                <input type='submit' name='delete_student' value='Delete'>
            </form>
          </td>";
    echo "</tr>";
}
echo "</table>";

// Add new student form
echo "<h3>Add New Student:</h3>";
echo "<form method='post'>";
echo "Name: <input type='text' name='name' required>";
echo "<br>Grade 1: <input type='number' name='grade1' min='0' max='100' required>";
echo "<br>Grade 2: <input type='number' name='grade2' min='0' max='100' required>";
echo "<br>Grade 3: <input type='number' name='grade3' min='0' max='100' required>";
echo "<br><input type='submit' name='add_student' value='Add Student'>";
echo "</form>";

// Demonstrate multidimensional array processing
echo "<h3>Array Processing Examples:</h3>";

// Example 1: Extract all student names
$names = array_column($_SESSION['students'], 'name');
echo "<p><strong>Student names:</strong> " . implode(', ', $names) . "</p>";

// Example 2: Find student with highest average
$highestAvg = 0;
$topStudent = '';
foreach ($_SESSION['students'] as $student) {
    $avg = array_sum($student['grades']) / count($student['grades']);
    if ($avg > $highestAvg) {
        $highestAvg = $avg;
        $topStudent = $student['name'];
    }
}
echo "<p><strong>Top student:</strong> $topStudent with average grade " . number_format($highestAvg, 2) . "</p>";

// Example 3: Sort students by average grade
usort($_SESSION['students'], function($a, $b) {
    $avgA = array_sum($a['grades']) / count($a['grades']);
    $avgB = array_sum($b['grades']) / count($b['grades']);
    return $avgB - $avgA; // Descending order
});

echo "<p><strong>Students sorted by grade (highest to lowest):</strong> ";
$sortedNames = [];
foreach ($_SESSION['students'] as $student) {
    $sortedNames[] = $student['name'];
}
echo implode(' > ', $sortedNames) . "</p>";
?>