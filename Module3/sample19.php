
<?php
//Using Static Variables
function trackVisits() {
    static $visits = 0;
    $visits++;
    echo "This is visit number $visits<br>";
}

trackVisits(); // Outputs: This is visit number 1
trackVisits(); // Outputs: This is visit number 2
trackVisits(); // Outputs: This is visit number 3


?>