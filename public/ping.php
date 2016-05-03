<?php

require_once 'functions.php';
  function pageController(){
  $count = inputGet('count');

  if (inputHas('data') && inputGet('data') == 'miss') {
      $count =  "Game over PONG.";
    };
      return ['count' => $count];
  };
  extract(pageController());
?>

<html>
<head>
    <title>Ping</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One|Pacifico' rel='stylesheet' type='text/css'>
    <style type="text/css">
      body{
        font-family: 'Poiret One';
      }
    </style>
</head>
<body>
    <h1>PING!</h1>
    <h3>Count: <?= escape($count) ?></h3>
    <p><a href="pong.php?count=<?= escape($count) + 1; ?>&data=hit">hit</a></p>
    <p><a href="pong.php?count=<?= escape($count); ?>&data=miss">miss</a></p>
</body>
</html>