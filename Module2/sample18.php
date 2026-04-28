<!-- sample18.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
</head>
<body>
    <h1>Grade Calculator</h1>
    
    <div class="container">
        <h2>Convert numerical score to letter grade</h2>
        <p>Enter your numerical score (0-100) to get your letter grade:</p>
        <form method="post">
            <label for="score">Score:</label>
            <input type="number" min="0" max="100" id="score" name="score" value="85" required>
            <button type="submit">Get Grade</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['score'])) {
            $score = intval($_POST['score']);
            $grade = "";
            
            if ($score >= 90) {
                $grade = "A";
            } elseif ($score >= 80) {
                $grade = "B";
            } elseif ($score >= 70) {
                $grade = "C";
            } elseif ($score >= 60) {
                $grade = "D";
            } else {
                $grade = "F";
            }
            
            echo '<div class="result">';
            echo "<h3>Results:</h3>";
            echo "<p>Your score: $score%</p>";
            echo "<p>Your grade: $grade</p>";
            
            echo "<h3>Grading Scale:</h3>";
            echo "<ul>";
            echo "<li>90-100: A (Excellent)</li>";
            echo "<li>80-89: B (Good)</li>";
            echo "<li>70-79: C (Average)</li>";
            echo "<li>60-69: D (Below Average)</li>";
            echo "<li>Below 60: F (Failing)</li>";
            echo "</ul>";
            
            // Show where the user's score falls
            echo "<p style='margin-top: 10px;'>";
            if ($score >= 90) {
                echo "Your score is in the A range (90-100).";
            } elseif ($score >= 80) {
                echo "Your score is in the B range (80-89).";
            } elseif ($score >= 70) {
                echo "Your score is in the C range (70-79).";
            } elseif ($score >= 60) {
                echo "Your score is in the D range (60-69).";
            } else {
                echo "Your score is in the F range (below 60).";
            }
            echo "</p>";
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>