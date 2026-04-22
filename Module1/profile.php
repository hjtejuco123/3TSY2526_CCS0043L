<?php
// --- PERSONAL INFO ---
$name = "Hadji Tejuco";
$program = "Bachelor of Science in Information Technology";
$yearLevel = "2nd Year";
$gpa = 3.85; // float

// --- CONTACT ---
$contact = [
    "email" => "hjtejuco@univ.edu",
    "phone" => "+63 905 123 4567"
];

// --- COURSES TAKEN ---
$courses = [
    "Introduction to Programming",
    "Computer Organization",
    "Discrete Structures",
    "Web Technologies",
    "Database Systems"
];

// --- SKILLS ---
$skills = ["PHP", "HTML/CSS", "JavaScript", "MySQL", "Git"];

// --- ACHIEVEMENTS / EXTRACURRICULARS ---
$achievements = [
    "President, Coding Club (2025)",
    "Top 10%, Midterm Exam – Programming Fundamentals",
    "Volunteer, Tech for All Outreach Program"
];

// --- VALIDATION: Check if GPA is numeric ---
$gpaDisplay = is_numeric($gpa) ? number_format($gpa, 2) : "Invalid GPA";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Academic Profile</title>
    <meta charset="UTF-8">
</head>
<body>

<h1><?php echo $name; ?></h1>
<h2><?php echo $program; ?> — <?php echo $yearLevel; ?></h2>
<p><strong>GPA:</strong> <?php echo $gpaDisplay; ?></p>

<hr>

<h3>Contact</h3>
<p>Email: <?php echo $contact["email"]; ?></p>
<p>Phone: <?php echo $contact["phone"]; ?></p>

<hr>

<h3>Courses Taken</h3>
<ul>
<?php foreach ($courses as $course): ?>
    <li><?php echo $course; ?></li>
<?php endforeach; ?>
</ul>

<hr>

<h3>Technical Skills</h3>
<ul>
<?php foreach ($skills as $skill): ?>
    <li><?php echo $skill; ?></li>
<?php endforeach; ?>
</ul>

<hr>

<h3>Achievements & Involvement</h3>
<ul>
<?php foreach ($achievements as $ach): ?>
    <li><?php echo $ach; ?></li>
<?php endforeach; ?>
</ul>

<p style="font-size:12px; margin-top:30px;">
    Generated using PHP • <?php echo date("Y"); ?>
</p>

</body>
</html>
