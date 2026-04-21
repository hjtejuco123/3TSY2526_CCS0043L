<?php
//Type Casting
$num = "123";
echo (int)$num + 10; // Outputs: 133
?>

<?php
//gettype()
$value = 42;
echo "Type: " . gettype($value); // Outputs: integer
?>

<?php
//settype()
$value = "42";
settype($value, "integer");
echo "Type: " . gettype($value); // Outputs: integer
?>

<?php
//Type Juggling
$a = "5";
$b = 10;
echo $a + $b; // Outputs: 15
?>

<?php
//Checking Types

$value = 3.14;
if (is_float($value)) {
    echo "Value is a float.";
}
?>