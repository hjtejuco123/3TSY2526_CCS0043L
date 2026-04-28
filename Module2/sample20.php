<!-- sample20.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Basic Logical Operators</title>
</head>
<body>
    <h1>Basic Logical Operators</h1>
    
    <div class="container">
        <h2>Understanding AND, OR, NOT</h2>
        <p>Enter values for A and B (0 or 1) to see how logical operators work:</p>
        <form method="post">
            <label for="a">A (0 or 1):</label>
            <input type="number" min="0" max="1" id="a" name="a" value="1" required>
            <label for="b" style="margin-left: 20px;">B (0 or 1):</label>
            <input type="number" min="0" max="1" id="b" name="b" value="0" required>
            <button type="submit">Calculate</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['a']) && isset($_POST['b'])) {
            $a = intval($_POST['a']);
            $b = intval($_POST['b']);
            
            // Convert to boolean
            $boolA = (bool)$a;
            $boolB = (bool)$b;
            
            echo '<div class="result">';
            echo "<h3>Results:</h3>";
            
            // AND (&&)
            $result = $boolA && $boolB;
            echo "<p>A AND B (A && B): " . ($result ? "true" : "false") . "</p>";
            echo "<p>Truth table: " . ($boolA ? "true" : "false") . " AND " . ($boolB ? "false" : "true") . " = " . ($result ? "true" : "false") . "</p>";
            
            // OR (||)
            $result = $boolA || $boolB;
            echo "<p style='margin-top: 10px;'>A OR B (A || B): " . ($result ? "true" : "false") . "</p>";
            echo "<p>Truth table: " . ($boolA ? "true" : "false") . " OR " . ($boolB ? "false" : "true") . " = " . ($result ? "true" : "false") . "</p>";
            
            // NOT (!)
            $result = !$boolA;
            echo "<p style='margin-top: 10px;'>NOT A (!A): " . ($result ? "true" : "false") . "</p>";
            echo "<p>Truth table: NOT " . ($boolA ? "true" : "false") . " = " . ($result ? "true" : "false") . "</p>";
            
            $result = !$boolB;
            echo "<p>NOT B (!B): " . ($result ? "true" : "false") . "</p>";
            echo "<p>Truth table: NOT " . ($boolB ? "false" : "true") . " = " . ($result ? "true" : "false") . "</p>";
            
            // XOR
            $result = $boolA xor $boolB;
            echo "<p style='margin-top: 10px;'>A XOR B (A xor B): " . ($result ? "true" : "false") . "</p>";
            echo "<p>Truth table: " . ($boolA ? "true" : "false") . " XOR " . ($boolB ? "false" : "true") . " = " . ($result ? "true" : "false") . "</p>";
            
            echo '</div>';
        }
        ?>
        
        <div class="container" style="margin-top: 20px;">
            <h3>Logical Operator Truth Tables</h3>
            
            <h4>AND (&&) Operator</h4>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>A && B</th>
                </tr>
                <tr>
                    <td>true</td>
                    <td>true</td>
                    <td>true</td>
                </tr>
                <tr>
                    <td>true</td>
                    <td>false</td>
                    <td>false</td>
                </tr>
                <tr>
                    <td>false</td>
                    <td>true</td>
                    <td>false</td>
                </tr>
                <tr>
                    <td>false</td>
                    <td>false</td>
                    <td>false</td>
                </tr>
            </table>
            
            <h4 style="margin-top: 15px;">OR (||) Operator</h4>
            <table border="1" cellpadding="5" cellspacing="0" style="margin-top: 5px;">
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>A || B</th>
                </tr>
                <tr>
                    <td>true</td>
                    <td>true</td>
                    <td>true</td>
                </tr>
                <tr>
                    <td>true</td>
                    <td>false</td>
                    <td>true</td>
                </tr>
                <tr>
                    <td>false</td>
                    <td>true</td>
                    <td>true</td>
                </tr>
                <tr>
                    <td>false</td>
                    <td>false</td>
                    <td>false</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>