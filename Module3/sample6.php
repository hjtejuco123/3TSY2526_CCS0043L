<?php
echo "<h2>sort() - Sorts by value; resets numeric keys</h2>";
echo "<p>This function sorts an array by values in ascending order and reindexes the array with numeric keys starting from 0.</p>";

echo "<form method='post'>";
echo "Enter array elements (comma separated): ";
echo "<input type='text' name='elements' value='Banana,Apple,Orange,Grape' size='50'>";
echo "<input type='submit' name='sort' value='Sort Array'>";
echo "</form>";

if (isset($_POST['sort'])) {
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
    
    // Apply sort() function
    sort($array);
    
    echo "<h3>Sorted Array (using sort()):</h3>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    
    echo "<p>Notice how the numeric keys have been reset to 0, 1, 2, 3 even though the original array had different ordering.</p>";
}
?>