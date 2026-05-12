<?php
// Program that demonstrates functions with parameters and return values
function calculate($num1, $num2, $operation) {
    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'subtract':
            return $num1 - $num2;
        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            if ($num2 == 0) {
                return "Error: Division by zero";
            }
            return $num1 / $num2;
        default:
            return "Invalid operation";
    }
}

echo "<h2>Mathematical Function Calculator</h2>";
echo "<form method='post'>";
echo "Number 1: <input type='number' name='num1' value='10' step='any' required>";
echo " Number 2: <input type='number' name='num2' value='5' step='any' required>";
echo "<br>Operation: ";
echo "<select name='operation'>";
echo "<option value='add'>Addition (+)</option>";
echo "<option value='subtract'>Subtraction (-)</option>";
echo "<option value='multiply'>Multiplication (×)</option>";
echo "<option value='divide'>Division (÷)</option>";
echo "</select>";
echo "<input type='submit' name='calculate' value='Calculate'>";
echo "</form>";

if (isset($_POST['calculate'])) {
    $num1 = floatval($_POST['num1']);
    $num2 = floatval($_POST['num2']);
    $operation = $_POST['operation'];
    
    $result = calculate($num1, $num2, $operation);
    
    // Display the calculation
    $operationSymbol = '';
    switch ($operation) {
        case 'add': $operationSymbol = '+'; break;
        case 'subtract': $operationSymbol = '-'; break;
        case 'multiply': $operationSymbol = '×'; break;
        case 'divide': $operationSymbol = '÷'; break;
    }
    
    echo "<h3>Result:</h3>";
    echo "<p>$num1 $operationSymbol $num2 = $result</p>";
    
    // Demonstrate function reuse
    echo "<h3>Additional Calculations:</h3>";
    echo "<ul>";
    echo "<li>Double the result: " . calculate($result, 2, 'multiply') . "</li>";
    echo "<li>Square the result: " . calculate($result, $result, 'multiply') . "</li>";
    echo "<li>Result plus 10: " . calculate($result, 10, 'add') . "</li>";
    echo "</ul>";
}
?>