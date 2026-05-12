<?php
echo "<h2>rsort() - Sorts by value in reverse; resets numeric keys</h2>";
echo "<p>This function sorts an array by values in descending order and reindexes the array with numeric keys starting from 0.</p>";

echo "<form method='post'>";
echo "Enter array elements (comma separated): ";
echo "<input type='text' name='elements' value='Banana,Apple,Orange,Grape' size='50'>";
echo "<input type='submit' name='rsort' value='Reverse Sort'>";
echo "</form>";

if (isset($_POST['rsort'])) {
    // Get user input and create array
    $input = $_POST['elements'];
    $array = explode(',', $input);
    $array = array_map('trim', $array);
    
    // Store original array for comparison
    $original = $array;
    
    echo "<h3>Original Array:</h3>";
    echo "<pre>";
    print_r($original);
    echo "</pre>";
    
    // Apply rsort() function
    rsort($array);
    
    echo "<h3>Reverse Sorted Array (using rsort()):</h3>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    
    echo "<p>Notice how the values are sorted in descending order and numeric keys have been reset to 0, 1, 2, 3.</p>";
}
?>