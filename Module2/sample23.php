<!-- sample23.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Weather Activity Advisor</title>
</head>
<body>
    <h1>Weather Activity Advisor</h1>
    
    <div class="container">
        <h2>Plan Activities Based on Weather</h2>
        <p>Enter current weather conditions to get activity recommendations:</p>
        <form method="post">
            <div style="margin-bottom: 10px;">
                <label>Temperature (°F):</label>
                <input type="number" id="temp" name="temp" value="75" required>
            </div>
            
            <div style="margin-bottom: 10px;">
                <label>Rain:</label>
                <label style="margin-left: 15px;"><input type="radio" name="rain" value="yes"> Yes</label>
                <label style="margin-left: 15px;"><input type="radio" name="rain" value="no" checked> No</label>
            </div>
            
            <div style="margin-bottom: 10px;">
                <label>Wind:</label>
                <label style="margin-left: 15px;"><input type="radio" name="wind" value="calm" checked> Calm</label>
                <label style="margin-left: 15px;"><input type="radio" name="wind" value="breezy"> Breezy</label>
                <label style="margin-left: 15px;"><input type="radio" name="wind" value="windy"> Windy</label>
            </div>
            
            <button type="submit">Get Recommendations</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && 
            isset($_POST['temp']) && isset($_POST['rain']) && isset($_POST['wind'])) {
            
            $temp = intval($_POST['temp']);
            $rain = $_POST['rain'];
            $wind = $_POST['wind'];
            
            echo '<div class="result">';
            echo "<h3>Activity Recommendations:</h3>";
            
            // Check if it's good for outdoor activities
            $goodForOutdoors = ($temp >= 60 && $temp <= 90) && 
                              ($rain == "no") && 
                              ($wind == "calm" || $wind == "breezy");
            
            // Check if it's good for swimming
            $goodForSwimming = ($temp >= 75 && $temp <= 95) && 
                              ($rain == "no") && 
                              ($wind != "windy");
            
            // Check if it's good for hiking
            $goodForHiking = ($temp >= 50 && $temp <= 85) && 
                            ($rain == "no") && 
                            ($wind != "windy");
            
            // Check if it's good for indoor activities
            $goodForIndoors = ($temp < 50 || $temp > 95) || 
                            ($rain == "yes") || 
                            ($wind == "windy");
            
            if ($goodForOutdoors) {
                echo "<p>✓ Great weather for general outdoor activities!</p>";
                
                if ($goodForSwimming) {
                    echo "<p>✓ Perfect conditions for swimming!</p>";
                }
                
                if ($goodForHiking) {
                    echo "<p>✓ Ideal for hiking today.</p>";
                }
            } else if ($goodForIndoors) {
                echo "<p>✗ Not ideal for most outdoor activities.</p>";
                echo "<p>✓ Consider these indoor activities instead:</p>";
                
                if ($temp < 50) {
                    echo "<p>- Visit a museum or art gallery</p>";
                    echo "<p>- Go to a movie theater</p>";
                    echo "<p>- Try an indoor climbing gym</p>";
                } else if ($temp > 95) {
                    echo "<p>- Visit an air-conditioned shopping mall</p>";
                    echo "<p>- Try an indoor water park</p>";
                    echo "<p>- Go to a library</p>";
                }
                
                if ($rain == "yes") {
                    echo "<p>- It's raining, so consider indoor activities</p>";
                }
                
                if ($wind == "windy") {
                    echo "<p>- It's too windy for most outdoor activities</p>";
                }
            }
            
            echo "<h3 style='margin-top: 15px;'>Condition Analysis:</h3>";
            echo "<p>Temperature: $temp°F - " . 
                 (($temp >= 60 && $temp <= 90) ? "good for outdoors" : "not ideal for outdoors") . "</p>";
            echo "<p>Rain: " . ($rain == "no" ? "no rain - good for outdoors" : "raining - not good for outdoors") . "</p>";
            echo "<p>Wind: $wind - " . 
                 ($wind == "calm" || $wind == "breezy" ? "good for outdoors" : "not good for outdoors") . "</p>";
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>