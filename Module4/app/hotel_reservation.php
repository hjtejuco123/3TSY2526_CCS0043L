<?php include('header.inc.php'); ?>

<h2>Hotel Reservation System</h2>
<form method="post">
    Enter your name: <input type="text" name="name"><br>
    Enter check-in date (YYYY-MM-DD): <input type="text" name="check_in"><br>
    Enter number of nights: <input type="text" name="nights"><br>
    <input type="submit" value="Book Reservation">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $check_in = $_POST['check_in'];
    $nights = $_POST['nights'];

    $check_out = date('Y-m-d', strtotime("+$nights days", strtotime($check_in)));
    $random_room = rand(100, 999); // Random room number

    echo "<h3>Reservation Details for $name:</h3>";
    echo "Check-In Date: $check_in<br>";
    echo "Check-Out Date: $check_out<br>";
    echo "Room Number: $random_room<br>";
    echo "Total Nights: $nights<br>";
}
?>
<br><br>
<a href="index.php">← Back to Main Menu</a>
<?php include('footer.inc.php'); ?>