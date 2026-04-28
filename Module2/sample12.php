<!-- sample12.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Counter in a Loop</title>
</head>
<body>
    <h1>Counter in a Loop</h1>
    
    <div class="container">
        <h2>Using Increment in a Loop</h2>
        <p>Enter how many times you want the loop to run:</p>
        <form method="post">
            <label for="loop_count">Number of iterations:</label>
            <input type="number" min="1" max="10" id="loop_count" name="loop_count" value="5" required>
            <button type="submit">Run Loop</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loop_count'])) {
            $count = intval($_POST['loop_count']);
            $counter = 1;
            
            echo '<div class="result">';
            echo "<h3>Loop Results:</h3>";
            echo "<ol>";
            
            while ($counter <= $count) {
                echo "<li>Iteration #" . $counter++ . "</li>";
                // Note: $counter++ returns the current value, THEN increments
            }
            
            echo "</ol>";
            echo "<p>Final counter value: $counter</p>";
            echo "<p>Explanation: The counter started at 1 and was incremented after each iteration.</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>