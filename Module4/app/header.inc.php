<?php require_once('config.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo APP_NAME; ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
            box-shadow: 0px 0px 10px #ccc;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: white;
            background: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
        }

        a:hover {
            background: #0056b3;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: gray;
        }
    </style>
</head>

<body>

<div class="container">
    <h1><?php echo APP_NAME; ?></h1>
    <p>Contact: <?php echo ADMIN_EMAIL; ?></p>
    <hr>