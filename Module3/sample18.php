
<?php
//Using Global Variables in Functions
$counter = 0;

function incrementCounter() {
    global $counter;
    $counter++;
    echo "Counter inside function: $counter<br>";
}

incrementCounter(); // Outputs: Counter inside function: 1
echo "Counter outside function: $counter"; // Outputs: Counter outside function: 1


?>