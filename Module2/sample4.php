<!-- sample4.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Right Associativity Example</title>
</head>
<body>
    <h1>Right Associativity Example</h1>
    
    <div class="container">
        <h2>Example 4: Assignment Operator Associativity</h2>
        <p>What are the values after: $a = $b = 5?</p>
        <form method="post">
            <label for="a_value">Value of $a:</label>
            <input type="number" id="a_value" name="a_value" required>
            <label for="b_value" style="margin-left: 20px;">Value of $b:</label>
            <input type="number" id="b_value" name="b_value" required>
            <button type="submit">Check Answers</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['a_value']) && isset($_POST['b_value'])) {
            $a_user = $_POST['a_value'];
            $b_user = $_POST['b_value'];
            
            // Assignment is right-associative: $a = ($b = 5)
            $b = 5;
            $a = $b;
            $a_correct = $a;
            $b_correct = $b;
            
            echo '<div class="result">';
            echo "<p>Correct values: \$a = $a_correct, \$b = $b_correct</p>";
            echo "<p>Calculation: \$a = \$b = 5 evaluates as \$a = (\$b = 5)</p>";
            
            if ($a_user == $a_correct && $b_user == $b_correct) {
                echo "<p style='color:green'>✓ Correct! Assignment operators are right-associative.</p>";
            } else {
                echo "<p style='color:red'>✗ Incorrect. Remember: Assignment operators evaluate right-to-left.</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>