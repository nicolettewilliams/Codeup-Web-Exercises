<?php
$favoriteThings = [
    'hamburgers',
    'cinnamon gum',
    'remington',
    'vikings',
    'water'
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Favorite Things</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One|Pacifico' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style type="text/css">
        body{
            font-family: 'Poiret One';
            text-align: center;
            background: url(/img/symphony.png) center fixed;
            color: rgb(160,160,160);
        }
        h1{
            font-family: 'Pacifico';
            color: #00FA9A;
        }
        #wrapper{
            margin: 0 20% 0 20%;
            background-color: #F5F0F0;
            text-align: center;
        }
        table{
            margin-right: auto;
            margin-left: auto;
            margin-top: 25px;
            margin-bottom: 80px;
        }
        table, th, td {
            border: 2px solid #8e8d8e;
        }
    </style>
</head>
<body>
    <div id='wrapper'>
        <h1>My Favorite Things</h1>

        <table>
            <?php foreach ($favoriteThings as $favoriteThing) { ?>
            <tr><td><?= $favoriteThing; ?></td></tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

            



