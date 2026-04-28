<!-- sample10.php -->
<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
    <h1>BMI Calculator</h1>
    
    <div class="container">
        <h2>Body Mass Index Calculator</h2>
        <p>Enter your height and weight to calculate BMI:</p>
        <form method="post">
            <label for="height">Height (meters):</label>
            <input type="number" step="0.01" id="height" name="height" required>
            <label for="weight" style="margin-left: 20px;">Weight (kg):</label>
            <input type="number" step="0.01" id="weight" name="weight" required>
            <button type="submit">Calculate BMI</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['height']) && isset($_POST['weight'])) {
            $height = floatval($_POST['height']);
            $weight = floatval($_POST['weight']);
            
            // BMI formula: weight / (height * height)
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 1);
            
            // Determine BMI category
            $category = "";
            if ($bmi < 18.5) {
                $category = "Underweight";
            } elseif ($bmi < 25) {
                $category = "Normal weight";
            } elseif ($bmi < 30) {
                $category = "Overweight";
            } else {
                $category = "Obesity";
            }
            
            echo '<div class="result">';
            echo "<p>Your BMI: $bmi</p>";
            echo "<p>Category: $category</p>";
            echo "<p>Calculation: $weight / ($height × $height) = $bmi</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>