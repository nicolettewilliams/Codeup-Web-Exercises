<?php
?>

<html>
<head>
    <title>Guessing Game</title>

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
        <h1>Guess The Number</h1>
        <input type="text" name="minimum" placeholder="Min Value"><br><br>
        <input type="text" name="maximum" placeholder="Max Value"><br><br>

    </div>

</body>
</html>