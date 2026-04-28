<!-- sample11.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Pre-increment vs Post-increment</title>
</head>
<body>
    <h1>Pre-increment vs Post-increment</h1>
    
    <div class="container">
        <h2>Understanding Increment Operators</h2>
        <p>Enter a starting value to see the difference between pre-increment (++$x) and post-increment ($x++):</p>
        <form method="post">
            <label for="start_value">Starting value:</label>
            <input type="number" id="start_value" name="start_value" value="5" required>
            <button type="submit">Show Results</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['start_value'])) {
            $start = intval($_POST['start_value']);
            
            // Pre-increment example
            $x1 = $start;
            $y1 = ++$x1; // Pre-increment: increment first, then assign
            
            // Post-increment example
            $x2 = $start;
            $y2 = $x2++; // Post-increment: assign first, then increment
            
            echo '<div class="result">';
            echo "<h3>Pre-increment (++\$x):</h3>";
            echo "<p>Starting with \$x = $start</p>";
            echo "<p>\$y = ++\$x</p>";
            echo "<p>Result: \$x = $x1, \$y = $y1</p>";
            echo "<p>Explanation: The value of \$x is incremented to " . ($start + 1) . " before being assigned to \$y.</p>";
            
            echo "<h3 style='margin-top: 15px;'>Post-increment (\$x++):</h3>";
            echo "<p>Starting with \$x = $start</p>";
            echo "<p>\$y = \$x++</p>";
            echo "<p>Result: \$x = $x2, \$y = $y2</p>";
            echo "<p>Explanation: The original value of \$x ($start) is assigned to \$y, then \$x is incremented to " . ($start + 1) . ".</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>