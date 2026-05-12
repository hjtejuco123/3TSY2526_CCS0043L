<?php
// Global variable
$globalVar = "I'm a global variable";

function scopeDemo($param) {
    // Local variable
    $localVar = "I'm a local variable";
    
    // Accessing global variable inside function
    global $globalVar;
    
    // Static variable (retains value between calls)
    static $staticVar = 0;
    $staticVar++;
    
    echo "<h3>Inside the function:</h3>";
    echo "<p>Parameter value: $param</p>";
    echo "<p>Global variable: $globalVar</p>";
    echo "<p>Local variable: $localVar</p>";
    echo "<p>Static variable (call count): $staticVar</p>";
    
    // Modify global variable
    $globalVar = "Global variable modified inside function";
    
    return [
        'staticVar' => $staticVar,
        'param' => $param
    ];
}

echo "<h2>Variable Scope Demonstration</h2>";
echo "<form method='post'>";
echo "Enter a value for the parameter: <input type='text' name='param' value='Hello'>";
echo "<input type='submit' name='submit' value='Test Scopes'>";
echo "</form>";

if (isset($_POST['submit'])) {
    $paramValue = $_POST['param'];
    
    // First function call
    echo "<h3>First function call:</h3>";
    $result1 = scopeDemo($paramValue);
    
    // Second function call to show static variable increment
    echo "<h3>Second function call:</h3>";
    $result2 = scopeDemo($paramValue);
    
    // Variables outside the function
    echo "<h3>Outside the function:</h3>";
    echo "<p>Global variable: $globalVar</p>";
    
    // These would cause errors:
    // echo "<p>Local variable: $localVar</p>";
    // echo "<p>Static variable: $staticVar</p>";
    
    echo "<p>Parameter value from first call: " . $result1['param'] . "</p>";
    echo "<p>Static variable value from first call: " . $result1['staticVar'] . "</p>";
    echo "<p>Static variable value from second call: " . $result2['staticVar'] . "</p>";
}
?>