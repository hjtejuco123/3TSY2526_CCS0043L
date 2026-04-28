<!-- sample1.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Operator Precedence Example</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .container { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 5px; }
        .result { background-color: #f0f0f0; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Operator Precedence Example</h1>
    
    <div class="container">
        <h2>Example 1: Multiplication vs Addition</h2>
        <p>What is the result of: 3 + 4 * 2?</p>
        <form method="post">
            <label for="answer1">Your answer:</label>
            <input type="number" id="answer1" name="answer1" required>
            <button type="submit">Check Answer</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer1'])) {
            $userAnswer = $_POST['answer1'];
            $correctAnswer = 3 + 4 * 2; // Multiplication happens first (4*2=8), then addition (3+8=11)
            
            echo '<div class="result">';
            echo "<p>Correct calculation: 3 + 4 * 2 = 3 + (4 * 2) = 3 + 8 = $correctAnswer</p>";
            
            if ($userAnswer == $correctAnswer) {
                echo "<p style='color:green'>✓ Correct! Multiplication has higher precedence than addition.</p>";
            } else {
                echo "<p style='color:red'>✗ Incorrect. Remember: Multiplication has higher precedence than addition.</p>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>