<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bank Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #eef5ff;
        }
        .dashboard {
            width: 500px;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }
        .card {
            background: #0066cc;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 15px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            background: red;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="dashboard">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

    <div class="card">
        <h3>Account Balance</h3>
        <p>₱50,000.00</p>
    </div>

    <div class="card">
        <h3>Account Type</h3>
        <p>Savings Account</p>
    </div>

    <a href="logout.php">Logout</a>
</div>

</body>
</html>