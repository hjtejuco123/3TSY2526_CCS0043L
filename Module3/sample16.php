
<?php

function mathOperations($a, $b) {
    // Nested function
    function multiply($x, $y) {
        return $x * $y;
    }
    
    $product = multiply($a, $b);
    echo "The product of $a and $b is: $product";
    
    // Nested function can't be called outside mathOperations
}

mathOperations(4, 5); // Works: Outputs product
// multiply(2, 3); // Would cause an error - function not defined


?>