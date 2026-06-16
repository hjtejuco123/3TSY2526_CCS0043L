<?php
$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$age = $_POST["age"] ?? "";

$message = "";

if (empty($name)) {
    $message = "Name is required.";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid email address.";
}
elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
    $message = "Phone number must be 11 digits.";
}
elseif ($age < 18) {
    $message = "Applicant must be at least 18 years old.";
}
else {
    $message = "Application submitted successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Result</title>
</head>
<body>

<h2>Application Result</h2>

<p><?php echo $message; ?></p>

<?php if ($message == "Application submitted successfully!") { ?>
    <p><b>Name:</b> <?php echo htmlspecialchars($name); ?></p>
    <p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>
    <p><b>Phone:</b> <?php echo htmlspecialchars($phone); ?></p>
    <p><b>Age:</b> <?php echo htmlspecialchars($age); ?></p>
<?php } ?>

<a href="application.php">Back to Form</a>

</body>
</html>