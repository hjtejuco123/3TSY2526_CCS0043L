<?php

//Functions that Return Values

function addNumbers($a, $b) {
    return $a + $b;
}

// Using the return value
$sum = addNumbers(5, 7);
echo "The sum is: $sum"; // Outputs: The sum is: 12
echo "<br>";
// Chaining function calls
echo "Double the sum: " . addNumbers($sum, $sum); // Outputs: Double the sum: 24


?>