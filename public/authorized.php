<?php
session_start();
require_once '../Auth.php';
require_once '../Input.php';
if (Auth::check()) {
    $username = Auth::user();
} else {
    header("Location: login.php");
    exit();
}   
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One|Pacifico' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body{
            font-family: 'Poiret One';
            text-align: center;
            background: url(/img/symphony.png) center fixed;
            color: rgb(160,160,160);
        }
        .wrapper{
            margin: 0 20% 0 20%;
            background-color: #F5F0F0;
            text-align: center;
        }
        h1{
          color: #00FA9A;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>You are authorized to enter</h1>
        <h3>Welcome <?= $username?> please enjoy our page!</h3>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>