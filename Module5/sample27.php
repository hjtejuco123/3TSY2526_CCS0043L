<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $age = $_POST["age"];

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
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Application Form</title>
</head>
<body>

<h2>Job Application Form</h2>

<form method="post">
    Full Name:<br>
    <input type="text" name="name"><br><br>

    Email:<br>
    <input type="text" name="email"><br><br>

    Phone Number:<br>
    <input type="text" name="phone"><br><br>

    Age:<br>
    <input type="number" name="age"><br><br>

    <input type="submit" value="Apply">
</form>

<h3><?php echo $message; ?></h3>

</body>
</html>