<!-- sample15.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Loop Control with Increment</title>
</head>
<body>
    <h1>Loop Control with Increment</h1>
    
    <div class="container">
        <h2>Using Increment in Different Loop Types</h2>
        <p>Enter a number to see how increment operators work in different loop structures:</p>
        <form method="post">
            <label for="num">Number:</label>
            <input type="number" min="1" max="10" id="num" name="num" value="5" required>
            <button type="submit">Show Loops</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num'])) {
            $n = intval($_POST['num']);
            
            echo '<div class="result">';
            echo "<h3>While Loop:</h3>";
            $i = 1;
            echo "<ul>";
            while ($i <= $n) {
                echo "<li>Value: $i</li>";
                $i++; // Post-increment
            }
            echo "</ul>";
            
            echo "<h3 style='margin-top: 15px;'>Do-While Loop:</h3>";
            $i = 1;
            echo "<ul>";
            do {
                echo "<li>Value: $i</li>";
                ++$i; // Pre-increment
            } while ($i <= $n);
            echo "</ul>";
            
            echo "<h3 style='margin-top: 15px;'>For Loop:</h3>";
            echo "<ul>";
            for ($i = 1; $i <= $n; $i++) {
                echo "<li>Value: $i</li>";
            }
            echo "</ul>";
            
            echo "<p>All loops count from 1 to $n, but use different increment approaches.</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>