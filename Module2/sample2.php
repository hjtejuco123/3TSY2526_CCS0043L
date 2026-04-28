<!-- sample2.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Operator Precedence with Parentheses</title>
    <style>
        /* Same styles as above */
    </style>
</head>
<body>
    <h1>Operator Precedence with Parentheses</h1>
    
    <div class="container">
        <h2>Example 2: Using Parentheses to Change Order</h2>
        <p>What is the result of: (3 + 4) * 2?</p>
        <form method="post">
            <label for="answer2">Your answer:</label>
            <input type="number" id="answer2" name="answer2" required>
            <button type="submit">Check Answer</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer2'])) {
            $userAnswer = $_POST['answer2'];
            $correctAnswer = (3 + 4) * 2; // Parentheses force addition first (3+4=7), then multiplication (7*2=14)
            
            echo '<div class="result">';
            echo "<p>Correct calculation: (3 + 4) * 2 = (7) * 2 = $correctAnswer</p>";
            
            if ($userAnswer == $correctAnswer) {
                echo "<p style='color:green'>✓ Correct! Parentheses override default precedence.</p>";
            } else {
                echo "<p style='color:red'>✗ Incorrect. Remember: Parentheses can change the order of operations.</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>