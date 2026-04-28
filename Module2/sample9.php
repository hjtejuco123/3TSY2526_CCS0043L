<!-- sample9.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest Calculator</title>
</head>
<body>
    <h1>Simple Interest Calculator</h1>
    
    <div class="container">
        <h2>Calculate Simple Interest</h2>
        <p>Enter principal amount, rate, and time to calculate simple interest:</p>
        <form method="post">
            <label for="principal">Principal amount ($):</label>
            <input type="number" step="0.01" id="principal" name="principal" required>
            <label for="rate" style="margin-left: 20px;">Annual interest rate (%):</label>
            <input type="number" step="0.01" id="rate" name="rate" required>
            <label for="time" style="margin-left: 20px;">Time (years):</label>
            <input type="number" step="0.1" id="time" name="time" required>
            <button type="submit">Calculate</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['principal']) && 
            isset($_POST['rate']) && isset($_POST['time'])) {
            
            $principal = floatval($_POST['principal']);
            $rate = floatval($_POST['rate']);
            $time = floatval($_POST['time']);
            
            // Simple interest formula: I = P × R × T / 100
            $interest = $principal * $rate * $time / 100;
            $totalAmount = $principal + $interest;
            
            echo '<div class="result">';
            echo "<p>Interest = $principal × $rate × $time / 100 = $" . number_format($interest, 2) . "</p>";
            echo "<p>Total amount = $" . number_format($totalAmount, 2) . "</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>