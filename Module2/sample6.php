<!-- arithmetic1.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Operators</title>
</head>
<body>
    <h1>Arithmetic Operators</h1>
    
    <div class="container">
        <h2>Basic Arithmetic Operations</h2>
        <p>Enter two numbers to see basic arithmetic operations:</p>
        <form method="post">
            <label for="num1">First number:</label>
            <input type="number" step="0.01" id="num1" name="num1" required>
            <label for="num2" style="margin-left: 20px;">Second number:</label>
            <input type="number" step="0.01" id="num2" name="num2" required>
            <button type="submit">Calculate</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num1']) && isset($_POST['num2'])) {
            $num1 = floatval($_POST['num1']);
            $num2 = floatval($_POST['num2']);
            
            $addition = $num1 + $num2;
            $subtraction = $num1 - $num2;
            $multiplication = $num1 * $num2;
            $division = $num2 != 0 ? $num1 / $num2 : "Undefined (division by zero)";
            $modulus = $num2 != 0 ? $num1 % $num2 : "Undefined (modulus by zero)";
            
            echo '<div class="result">';
            echo "<h3>Results:</h3>";
            echo "<p>$num1 + $num2 = $addition</p>";
            echo "<p>$num1 - $num2 = $subtraction</p>";
            echo "<p>$num1 * $num2 = $multiplication</p>";
            echo "<p>$num1 / $num2 = $division</p>";
            echo "<p>$num1 % $num2 = $modulus</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>