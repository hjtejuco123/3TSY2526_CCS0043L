<!-- sample16.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Basic Comparison Operators</title>
</head>
<body>
    <h1>Basic Comparison Operators</h1>
    
    <div class="container">
        <h2>Understanding Comparison Operators</h2>
        <p>Enter two numbers to compare them:</p>
        <form method="post">
            <label for="num1">First number:</label>
            <input type="number" step="0.01" id="num1" name="num1" value="10" required>
            <label for="num2" style="margin-left: 20px;">Second number:</label>
            <input type="number" step="0.01" id="num2" name="num2" value="5" required>
            <button type="submit">Compare</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num1']) && isset($_POST['num2'])) {
            $a = floatval($_POST['num1']);
            $b = floatval($_POST['num2']);
            
            echo '<div class="result">';
            echo "<h3>Comparison Results:</h3>";
            
            // Equal (==)
            $result = ($a == $b);
            echo "<p>\$a == \$b: " . ($result ? "true" : "false") . " (Equal operator)</p>";
            
            // Identical (===)
            $result = ($a === $b);
            echo "<p>\$a === \$b: " . ($result ? "true" : "false") . " (Identical operator - checks value AND type)</p>";
            
            // Not equal (!=)
            $result = ($a != $b);
            echo "<p>\$a != \$b: " . ($result ? "true" : "false") . " (Not equal operator)</p>";
            
            // Greater than (>)
            $result = ($a > $b);
            echo "<p>\$a > \$b: " . ($result ? "true" : "false") . " (Greater than operator)</p>";
            
            // Less than (<)
            $result = ($a < $b);
            echo "<p>\$a < \$b: " . ($result ? "true" : "false") . " (Less than operator)</p>";
            
            // Greater than or equal to (>=)
            $result = ($a >= $b);
            echo "<p>\$a >= \$b: " . ($result ? "true" : "false") . " (Greater than or equal to operator)</p>";
            
            // Less than or equal to (<=)
            $result = ($a <= $b);
            echo "<p>\$a <= \$b: " . ($result ? "true" : "false") . " (Less than or equal to operator)</p>";
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>