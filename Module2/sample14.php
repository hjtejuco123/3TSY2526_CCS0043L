<!-- sample14.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Combined Operations with Increment</title>
</head>
<body>
    <h1>Combined Operations with Increment</h1>
    
    <div class="container">
        <h2>Complex Increment Expressions</h2>
        <p>Enter a starting value to see how increment operators work in complex expressions:</p>
        <form method="post">
            <label for="value">Starting value:</label>
            <input type="number" id="value" name="value" value="5" required>
            <button type="submit">Calculate</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['value'])) {
            $value = intval($_POST['value']);
            
            // Example 1: $x = $a + ++$a
            $a1 = $value;
            $x1 = $a1 + ++$a1;
            
            // Example 2: $x = $a++ + $a
            $a2 = $value;
            $x2 = $a2++ + $a2;
            
            // Example 3: $x = ++$a + ++$a
            $a3 = $value;
            $x3 = ++$a3 + ++$a3;
            
            // Example 4: $x = $a + $a++
            $a4 = $value;
            $x4 = $a4 + $a4++;
            
            echo '<div class="result">';
            echo "<h3>Results:</h3>";
            
            echo "<p><strong>Example 1:</strong> \$x = \$a + ++\$a</p>";
            echo "<p>Starting with \$a = $value</p>";
            echo "<p>Result: \$a = $a1, \$x = $x1</p>";
            echo "<p>Explanation: ++\$a increments \$a to " . ($value + 1) . " first, then adds to original \$a ($value), so \$x = $value + " . ($value + 1) . " = $x1</p>";
            
            echo "<p style='margin-top: 15px;'><strong>Example 2:</strong> \$x = \$a++ + \$a</p>";
            echo "<p>Starting with \$a = $value</p>";
            echo "<p>Result: \$a = $a2, \$x = $x2</p>";
            echo "<p>Explanation: \$a++ returns \$a ($value) first, then increments to " . ($value + 1) . ", then adds to current \$a (" . ($value + 1) . "), so \$x = $value + " . ($value + 1) . " = $x2</p>";
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>