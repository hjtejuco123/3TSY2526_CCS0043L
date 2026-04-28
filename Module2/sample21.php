<!-- sample21.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Age and Membership Check</title>
</head>
<body>
    <h1>Age and Membership Check</h1>
    
    <div class="container">
        <h2>Gym Access System</h2>
        <p>Enter your age and membership status to check gym access:</p>
        <form method="post">
            <label for="age">Age:</label>
            <input type="number" min="0" max="120" id="age" name="age" value="20" required>
            
            <div style="margin: 10px 0;">
                <label>Membership:</label>
                <label style="margin-left: 15px;"><input type="radio" name="membership" value="active" checked> Active</label>
                <label style="margin-left: 15px;"><input type="radio" name="membership" value="expired"> Expired</label>
            </div>
            
            <button type="submit">Check Access</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['age']) && isset($_POST['membership'])) {
            $age = intval($_POST['age']);
            $membership = $_POST['membership'];
            
            echo '<div class="result">';
            echo "<h3>Access Results:</h3>";
            
            // Regular access: must be 18+ AND have active membership
            $regularAccess = ($age >= 18) && ($membership === "active");
            
            // Special access for teens: must be 13-17 AND have active membership AND parental consent
            $teenAccess = ($age >= 13 && $age <= 17) && ($membership === "active");
            // (In a real system, we'd check for parental consent too)
            
            // Senior access: must be 65+ AND have active membership
            $seniorAccess = ($age >= 65) && ($membership === "active");
            
            if ($regularAccess || $teenAccess || $seniorAccess) {
                echo "<p style='color:green'>✓ You have access to the gym facilities!</p>";
                
                if ($age < 18) {
                    echo "<p>As a minor, you must be accompanied by an adult during certain hours.</p>";
                }
            } else {
                echo "<p style='color:red'>✗ You do not have access to the gym facilities.</p>";
                
                if ($age < 18) {
                    echo "<p>You must be at least 13 years old to use the gym.</p>";
                }
                
                if ($membership !== "active") {
                    echo "<p>Your membership is not active. Please renew your membership.</p>";
                }
            }
            
            echo "<h3 style='margin-top: 15px;'>Explanation:</h3>";
            echo "<p>Access requires: (age >= 18 AND active membership) OR (13 <= age <= 17 AND active membership)</p>";
            echo "<p>Your conditions: age = $age, membership = $membership</p>";
            echo "<p>Regular access condition: " . ($age >= 18 ? "true" : "false") . " AND " . ($membership === "active" ? "true" : "false") . " = " . ($regularAccess ? "true" : "false") . "</p>";
            
            if ($age >= 13 && $age <= 17) {
                echo "<p>Teen access condition: true AND " . ($membership === "active" ? "true" : "false") . " = " . ($teenAccess ? "true" : "false") . "</p>";
            }
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>