<?php

require'../ServerName.php';

function pageController(){
    

    $generator = new ServerName();
    return['name' => $generator->serverName()];

    
};

extract(pageController());



?>

<!DOCTYPE html>
<html>
<head>
    <title>Random Server Name</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One|Pacifico' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body{
            font-family: 'Poiret One';
            text-align: center;
            background: url(/img/upfeathers.png) center fixed;
            color: rgb(160,160,160);
        }

        .wrapper{
            margin: 0 20% 0 20%;
            background-color: #F5F0F0;
            text-align: center;
        }

        #title{
            color: #fd2e58;
            font-family: 'Pacifico';
        }

        h2{
            color: #16bcb7;
            font-family: 'Poiret One';
            padding-bottom: 200px;
        }
    </style>

</head>
<body>

    <div class='wrapper'>

        <h1 id='title'>Server Name Generator</h1>
        <h2><?= $serverName; ?></h2>

    </div>

</body>
</html>



