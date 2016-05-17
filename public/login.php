<?php
require_once '../Auth.php';
require_once '../Input.php';
require_once 'functions.php';
session_start();
$username = Input::get('username') && escape($_REQUEST['username'] == 'guest');
$password = Input::get('password') && escape($_REQUEST['password'] == 'password');
$userinfo = false;
$header = "Welcome. Please login.";
if ($_POST){
        if (Auth::attempt(Input::get("username"), Input::get('password'))){
            echo "Test";
            header("Location: authorized.php");
            exit();
        }else{
            $header = "Please enter valid credentials.";
        }
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
            background: url(/img/psychedelic_pattern.png) center fixed;
            color: rgb(160,160,160);
        }
        .wrapper{
            margin: 0 20% 0 20%;
            background-color: #F5F0F0;
            text-align: center;
        }
        h1{
          color: #00FA9A;
          font-size: 40px;
        }
    </style>
</head>
<body>
  <div class='wrapper'>
    <h1><?= $header ?></h1>
      <form method="POST">
          <input type="text" name="username" placeholder="Username"><br><br>
          <input type="password" name="password" placeholder="Password"><br><br>
          <input class="submit" type="submit" >
      </form>
  </div>
</body>
</html>