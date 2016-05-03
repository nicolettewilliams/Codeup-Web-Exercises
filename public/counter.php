<?php

function pageController() {
    if (empty($_GET)){
        $counter = 0;
    }else if($_GET['direction'] == 'up'){
        $counter = (int)$_GET['counter'] + 1;
    }else if ($_GET['direction'] == 'down'){
        $counter = (int)$_GET['counter'] - 1;
    };

    $data = array();
    $data['value'] = $counter;
    return $data;    
};

extract(pageController());
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Counter</title>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One|Pacifico' rel='stylesheet' type='text/css'>
        <style type="text/css">
            body{
                font-family: 'Poiret One'
            }
        </style>
    </head>
    <body>
        <h2>Current counter value: <?= $value?></h2>
        <a href="?direction=up&counter=<?= $value ?>">UP</a>
        <a href="?direction=down&counter=<?= $value ?>">DOWN</a>
    </body>
</html>