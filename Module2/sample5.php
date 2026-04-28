<!-- sample5.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Complex Precedence Example</title>
</head>
<body>
    <h1>Complex Precedence Example</h1>
    
    <div class="container">
        <h2>Example 5: Complex Expression</h2>
        <p>What is the result of: 2 + 3 * 4 / 2 - 1?</p>
        <form method="post">
            <label for="answer5">Your answer:</label>
            <input type="number" step="0.01" id="answer5" name="answer5" required>
            <button type="submit">Check Answer</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer5'])) {
            $userAnswer = $_POST['answer5'];
            $correctAnswer = 2 + 3 * 4 / 2 - 1;
            // Order: 
            // 1. Multiplication: 3 * 4 = 12
            // 2. Division: 12 / 2 = 6
            // 3. Addition: 2 + 6 = 8
            // 4. Subtraction: 8 - 1 = 7
            
            echo '<div class="result">';
            echo "<p>Correct calculation steps:</p>";
            echo "<ol>";
            echo "<li>Multiplication first: 3 * 4 = 12</li>";
            echo "<li>Division next: 12 / 2 = 6</li>";
            echo "<li>Addition next: 2 + 6 = 8</li>";
            echo "<li>Subtraction last: 8 - 1 = 7</li>";
            echo "<li>Final result: $correctAnswer</li>";
            echo "</ol>";
            
            if (abs($userAnswer - $correctAnswer) < 0.0001) {
                echo "<p style='color:green'>✓ Correct! You understand the order of operations.</p>";
            } else {
                echo "<p style='color:red'>✗ Incorrect. Remember: Multiplication and division have higher precedence than addition and subtraction, and they're evaluated left-to-right.</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>