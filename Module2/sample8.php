<!-- sample8.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Area and Perimeter Calculator</title>
</head>
<body>
    <h1>Area and Perimeter Calculator</h1>
    
    <div class="container">
        <h2>Rectangle Calculator</h2>
        <p>Enter the dimensions of a rectangle:</p>
        <form method="post">
            <label for="length">Length:</label>
            <input type="number" step="0.1" id="length" name="length" required>
            <label for="width" style="margin-left: 20px;">Width:</label>
            <input type="number" step="0.1" id="width" name="width" required>
            <button type="submit">Calculate</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['length']) && isset($_POST['width'])) {
            $length = floatval($_POST['length']);
            $width = floatval($_POST['width']);
            
            $area = $length * $width;
            $perimeter = 2 * ($length + $width);
            
            echo '<div class="result">';
            echo "<p>Area = $length × $width = $area</p>";
            echo "<p>Perimeter = 2 × ($length + $width) = $perimeter</p>";
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>