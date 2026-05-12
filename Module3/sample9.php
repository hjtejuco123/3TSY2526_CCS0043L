<?php
echo "<h2>arsort() - Sorts by value in reverse; maintains key association</h2>";
echo "<p>This function sorts an array by values in descending order while maintaining the original key-value associations.</p>";

echo "<form method='post'>";
echo "Enter array elements (comma separated): ";
echo "<input type='text' name='elements' value='d=>Lemon,a=>Orange,b=>Banana,c=>Apple' size='50'>";
echo "<p><small>Format: key=>value,key=>value (e.g., a=>Apple,b=>Banana)</small></p>";
echo "<input type='submit' name='arsort' value='Reverse Sort by Value (Keep Keys)'>";
echo "</form>";

if (isset($_POST['arsort'])) {
    // Get user input and create associative array
    $input = $_POST['elements'];
    $pairs = explode(',', $input);
    $array = [];
    
    foreach ($pairs as $pair) {
        $kv = explode('=>', $pair);
        if (count($kv) == 2) {
            $array[trim($kv[0])] = trim($kv[1]);
        }
    }
    
    // If no associative format was used, create numeric keys
    if (empty($array)) {
        $array = explode(',', $input);
        $array = array_map('trim', $array);
    }
    
    // Store original array for comparison
    $original = $array;
    
    echo "<h3>Original Array:</h3>";
    echo "<pre>";
    print_r($original);
    echo "</pre>";
    
    // Apply arsort() function
    arsort($array);
    
    echo "<h3>Reverse Sorted Array (using arsort()):</h3>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    
    echo "<p>Notice how the values are sorted in descending order but the original keys are preserved.</p>";
}
?>