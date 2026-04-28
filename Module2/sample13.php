<!-- sample13.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Countdown with Decrement Operator</title>
</head>
<body>
    <h1>Countdown with Decrement Operator</h1>
    
    <div class="container">
        <h2>Using Decrement Operator for Countdown</h2>
        <p>Enter a starting number for the countdown:</p>
        <form method="post">
            <label for="start_num">Starting number:</label>
            <input type="number" min="1" max="20" id="start_num" name="start_num" value="10" required>
            <button type="submit">Start Countdown</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['start_num'])) {
            $start = intval($_POST['start_num']);
            
            echo '<div class="result">';
            echo "<h3>Countdown Results:</h3>";
            echo "<ul>";
            
            $i = $start;
            while ($i > 0) {
                echo "<li>" . $i-- . "</li>";
                // $i-- returns current value, THEN decrements
            }
            
            echo "</ul>";
            echo "<p>Blast off!</p>";
            echo "<p>Final value of i: $i</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>