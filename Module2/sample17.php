<!-- sample17.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Age Verification System</title>
</head>
<body>
    <h1>Age Verification System</h1>
    
    <div class="container">
        <h2>Age Verification</h2>
        <p>Enter your age to check what services you can access:</p>
        <form method="post">
            <label for="age">Your age:</label>
            <input type="number" min="0" max="120" id="age" name="age" value="21" required>
            <button type="submit">Check Eligibility</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['age'])) {
            $age = intval($_POST['age']);
            
            echo '<div class="result">';
            echo "<h3>Eligibility Results:</h3>";
            
            // Voting
            if ($age >= 18) {
                echo "<p>✓ You are eligible to vote (must be 18 or older)</p>";
            } else {
                echo "<p>✗ You are not eligible to vote (must be 18 or older)</p>";
            }
            
            // Driving
            if ($age >= 16) {
                echo "<p>✓ You are eligible to get a driver's license (must be 16 or older)</p>";
            } else {
                echo "<p>✗ You are not eligible to get a driver's license (must be 16 or older)</p>";
            }
            
            // Drinking
            if ($age >= 21) {
                echo "<p>✓ You are legally allowed to purchase alcohol (must be 21 or older)</p>";
            } else {
                echo "<p>✗ You are not legally allowed to purchase alcohol (must be 21 or older)</p>";
            }
            
            // Senior benefits
            if ($age >= 65) {
                echo "<p>✓ You qualify for senior citizen benefits (must be 65 or older)</p>";
            } else {
                echo "<p>✗ You do not qualify for senior citizen benefits (must be 65 or older)</p>";
            }
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>