<?php

// A 2D array representing a matrix
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

// Accessing elements
echo $matrix[0][0]; // Outputs: 1
echo "<br>";
echo $matrix[1][2]; // Outputs: 6
echo "<br>";
// Iterating through a multidimensional array
foreach ($matrix as $rowIndex => $row) {
    foreach ($row as $colIndex => $value) {
        echo "matrix[$rowIndex][$colIndex] = $value<br>";
    }
}



?>