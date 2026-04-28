<!-- sample7.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Temperature Conversion</title>
</head>
<body>
    <h1>Temperature Conversion</h1>
    
    <div class="container">
        <h2>Celsius to Fahrenheit</h2>
        <p>Convert Celsius to Fahrenheit using formula: F = C * 9/5 + 32</p>
        <form method="post">
            <label for="celsius">Temperature in Celsius:</label>
            <input type="number" step="0.1" id="celsius" name="celsius" required>
            <button type="submit">Convert</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['celsius'])) {
            $celsius = floatval($_POST['celsius']);
            $fahrenheit = $celsius * 9/5 + 32;
            
            echo '<div class="result">';
            echo "<p>$celsius°C = $fahrenheit°F</p>";
            echo "<p>Calculation: $celsius × 9/5 + 32 = $fahrenheit</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>