<?php
// Program that lets users build an array and inspect it with print_r and var_dump
echo "<h2>Array Builder and Inspector</h2>";
echo "<form method='post'>";
echo "Enter elements (comma separated): <input type='text' name='elements' value='Apple,Banana,Cherry'>";
echo "<input type='submit' name='submit' value='Create Array'>";
echo "</form>";

if (isset($_POST['submit'])) {
    // Get user input and create array
    $input = $_POST['elements'];
    $array = explode(',', $input);
    
    // Trim whitespace from each element
    $array = array_map('trim', $array);
    
    echo "<h3>Your Array:</h3>";
    
    // Display with print_r
    echo "<h4>Using print_r():</h4>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    
    // Display with var_dump
    echo "<h4>Using var_dump():</h4>";
    echo "<pre>";
    ob_start();
    var_dump($array);
    $output = ob_get_clean();
    echo htmlspecialchars($output);
    echo "</pre>";
    
    // Display array with foreach
    echo "<h4>Iterating with foreach:</h4>";
    echo "<ul>";
    foreach ($array as $index => $value) {
        echo "<li>Index [$index] => $value</li>";
    }
    echo "</ul>";
}
?>