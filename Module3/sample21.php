<?php
// Program that lets users input array elements and choose sorting method
echo "<h2>Array Sorting Demonstration</h2>";
echo "<form method='post'>";
echo "Enter elements (comma separated): <input type='text' name='elements' value='Banana,Apple,Orange,Grape'>";
echo "<br>Select sorting method: ";
echo "<select name='sort_method'>";
echo "<option value='sort'>sort() - Sort by value</option>";
echo "<option value='rsort'>rsort() - Sort by value (reverse)</option>";
echo "<option value='asort'>asort() - Sort by value (keep keys)</option>";
echo "<option value='arsort'>arsort() - Sort by value reverse (keep keys)</option>";
echo "<option value='ksort'>ksort() - Sort by key</option>";
echo "<option value='krsort'>krsort() - Sort by key (reverse)</option>";
echo "</select>";
echo "<input type='submit' name='submit' value='Sort Array'>";
echo "</form>";

if (isset($_POST['submit'])) {
    // Get user input and create array
    $input = $_POST['elements'];
    $array = explode(',', $input);
    $array = array_map('trim', $array);
    
    // Create associative array if needed for asort/arsort
    if (in_array($_POST['sort_method'], ['asort', 'arsort'])) {
        $temp = [];
        foreach ($array as $key => $value) {
            $temp[$key] = $value;
        }
        $array = $temp;
    }
    
    // Store original for comparison
    $original = $array;
    
    // Apply selected sorting method
    $method = $_POST['sort_method'];
    $method($array);
    
    // Display results
    echo "<h3>Sorting Results:</h3>";
    
    echo "<h4>Original Array:</h4>";
    echo "<pre>";
    print_r($original);
    echo "</pre>";
    
    echo "<h4>Sorted Array (using $method):</h4>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
?>