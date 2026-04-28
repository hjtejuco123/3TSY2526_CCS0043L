<!-- sample19.php -->
<!DOCTYPE html>
<html>
<head>
    <title>String Comparison</title>
</head>
<body>
    <h1>String Comparison</h1>
    
    <div class="container">
        <h2>Comparing Strings</h2>
        <p>Enter two strings to compare them:</p>
        <form method="post">
            <label for="str1">First string:</label>
            <input type="text" id="str1" name="str1" value="apple" required>
            <label for="str2" style="margin-left: 20px;">Second string:</label>
            <input type="text" id="str2" name="str2" value="banana" required>
            <button type="submit">Compare Strings</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['str1']) && isset($_POST['str2'])) {
            $str1 = $_POST['str1'];
            $str2 = $_POST['str2'];
            
            echo '<div class="result">';
            echo "<h3>String Comparison Results:</h3>";
            
            // Equal (==)
            $result = ($str1 == $str2);
            echo "<p>\"$str1\" == \"$str2\": " . ($result ? "true" : "false") . "</p>";
            
            // Identical (===)
            $result = ($str1 === $str2);
            echo "<p>\"$str1\" === \"$str2\": " . ($result ? "true" : "false") . " (checks value AND type)</p>";
            
            // Less than (<)
            $result = ($str1 < $str2);
            echo "<p>\"$str1\" < \"$str2\": " . ($result ? "true" : "false") . " (lexicographical comparison)</p>";
            
            // Greater than (>)
            $result = ($str1 > $str2);
            echo "<p>\"$str1\" > \"$str2\": " . ($result ? "true" : "false") . " (lexicographical comparison)</p>";
            
            echo "<h3 style='margin-top: 15px;'>Explanation:</h3>";
            echo "<p>String comparison in PHP is done character by character based on ASCII values.</p>";
            
            if ($str1 != $str2) {
                // Find the first differing character
                $len = min(strlen($str1), strlen($str2));
                $diffPos = -1;
                
                for ($i = 0; $i < $len; $i++) {
                    if ($str1[$i] != $str2[$i]) {
                        $diffPos = $i;
                        break;
                    }
                }
                
                if ($diffPos >= 0) {
                    $char1 = $str1[$diffPos];
                    $char2 = $str2[$diffPos];
                    $ascii1 = ord($char1);
                    $ascii2 = ord($char2);
                    
                    echo "<p>The first difference is at position " . ($diffPos + 1) . ":</p>";
                    echo "<p>'$char1' (ASCII: $ascii1) vs '$char2' (ASCII: $ascii2)</p>";
                    
                    if ($ascii1 < $ascii2) {
                        echo "<p>Since $ascii1 < $ascii2, \"$str1\" < \"$str2\" is true</p>";
                    } else {
                        echo "<p>Since $ascii1 > $ascii2, \"$str1\" > \"$str2\" is true</p>";
                    }
                } else {
                    $shorter = (strlen($str1) < strlen($str2)) ? $str1 : $str2;
                    $longer = (strlen($str1) < strlen($str2)) ? $str2 : $str1;
                    
                    echo "<p>One string is a prefix of the other. \"$shorter\" is shorter than \"$longer\", so \"$shorter\" < \"$longer\"</p>";
                }
            }
            
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>