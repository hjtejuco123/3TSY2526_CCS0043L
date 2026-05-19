<?php
// String Manipulation Functions
function reverseString($string) {
    return strrev($string);
}

function capitalizeWords($string) {
    return ucwords(strtolower($string));
}

// Math Functions
function generateRandomNumber($min, $max) {
    return rand($min, $max);
}

function calculatePercentage($value, $total) {
    return ($total > 0) ? ($value / $total) * 100 : 0;
}

// Date Functions
function formatDate($date, $format = 'Y-m-d') {
    return date($format, strtotime($date));
}

function addDaysToDate($date, $days) {
    return date('Y-m-d', strtotime("+$days days", strtotime($date)));
}
?>