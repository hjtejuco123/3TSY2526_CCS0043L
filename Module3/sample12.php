<?php
echo "<h2>usort() - Sorts using a user-defined comparison function</h2>";
echo "<p>This function sorts an array using a user-defined comparison function.</p>";

echo "<form method='post'>";
echo "Enter array elements (comma separated): ";
echo "<input type='text' name='elements' value='Banana,Apple,Orange,Grape' size='50'>";
echo "<p><small>Enter custom sort criteria:</small></p>";
echo "<input type='radio' name='sort_type' value='length' checked> Sort by string length<br>";
echo "<input type='radio' name='sort_type' value='vowel'> Sort by vowel count<br>";
echo "<input type='radio' name='sort_type' value='custom'> Custom sort function<br>";
echo "<input type='submit' name='usort' value='Sort with Custom Function'>";
echo "</form>";

// Custom comparison functions
function compareByLength($a, $b) {
    return strlen($a) - strlen($b);
}

function countVowels($str) {
    $str = strtolower($str);
    return substr_count($str, 'a') + substr_count($str, 'e') + 
           substr_count($str, 'i') + substr_count($str, 'o') + 
           substr_count($str, 'u');
}

function compareByVowelCount($a, $b) {
    return countVowels($a) - countVowels($b);
}

if (isset($_POST['usort'])) {
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
    
    $sortType = $_POST['sort_type'];
    $sortDescription = "";
    
    // Apply usort() with different comparison functions
    switch ($sortType) {
        case 'length':
            usort($array, 'compareByLength');
            $sortDescription = "sorted by string length (shortest to longest)";
            break;
        case 'vowel':
            usort($array, 'compareByVowelCount');
            $sortDescription = "sorted by vowel count (least to most)";
            break;
        case 'custom':
            // Custom function to sort by last character
            usort($array, function($a, $b) {
                return strcmp(substr($a, -1), substr($b, -1));
            });
            $sortDescription = "sorted by last character";
            break;
    }
    
    echo "<h3>Sorted Array (using usort() - $sortDescription):</h3>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    
    echo "<p>With usort(), you can define exactly how the elements should be compared during sorting.</p>";
}
?>