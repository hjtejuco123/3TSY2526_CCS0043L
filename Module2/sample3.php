<!-- sample3.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Operator Associativity Example</title>
</head>
<body>
    <h1>Operator Associativity Example</h1>
    
    <div class="container">
        <h2>Example 3: Left-to-Right Associativity</h2>
        <p>What is the result of: 10 - 5 - 2?</p>
        <form method="post">
            <label for="answer3">Your answer:</label>
            <input type="number" id="answer3" name="answer3" required>
            <button type="submit">Check Answer</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer3'])) {
            $userAnswer = $_POST['answer3'];
            $correctAnswer = 10 - 5 - 2; // Left-to-right: (10-5)=5, then 5-2=3
            
            echo '<div class="result">';
            echo "<p>Correct calculation: 10 - 5 - 2 = (10 - 5) - 2 = 5 - 2 = $correctAnswer</p>";
            
            if ($userAnswer == $correctAnswer) {
                echo "<p style='color:green'>✓ Correct! Subtraction is left-associative.</p>";
            } else {
                echo "<p style='color:red'>✗ Incorrect. Remember: Subtraction operators of the same precedence evaluate left-to-right.</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>