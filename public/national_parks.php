<?php  
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');
require_once '../db_connect.php';
require_once '../Input.php';
$limit = 4;
$lastPage = ceil(($dbc->query('SELECT count(*) FROM national_parks')->fetchColumn())/$limit);
$page = Input::has('page')? Input::get('page') : 1;
$nextPage = $page + 1; 
$previousPage = $page - 1; 
$offset = ($page - 1) * 4; //page number determines how much offset there is
$parks = $dbc->query("SELECT * FROM national_parks LIMIT $limit OFFSET $offset")->fetchAll(PDO::FETCH_ASSOC);

if(Input::has('name') && Input::has('location') && Input::has('date_established') && Input::has('area_in_acres') && Input::has('description'))
    {
        var_dump('inside if');
        $name = Input::get('name');
        $location = Input::get('location');
        $date_established = Input::get('date_established');
        $area_in_acres = Input::get('area_in_acres');
        $description = Input::get('description');
        $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':location', $location, PDO::PARAM_STR);
        $stmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
        $stmt->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_INT);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>National Parks</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/nationalpark.css">
</head>
<body>
    <div id="wrapper">
        <h1>National Parks</h1>
        <div class="centerdiv">
            <img id='mountain' src="/img/mountain.gif">
        </div>
        <div class='tabledeco'>
            <table class = 'table table-bordered'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Date Established</th>
                        <th>Area (acres)</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parks as $park) : ?>
                    <tr>
                        <td><?= $park['name'] ?> </td>
                        <td><?= $park['location'] ?> </td>
                        <td><?= $park['date_established'] ?> </td>
                        <td><?= $park['area_in_acres'] ?> </td>
                        <td class='teaser' data-id="<?= $park['id'] ?>"><?= mb_strimwidth($park['description'], 0, 25, "(...)"); ?></td>
                        <td class='fulldescription' data-id="<?= $park['id'] ?>"><?= $park['description'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="centerdiv">
            <?php if($page != 1): ?>
                <a href="?page=<?= $previousPage ?>" class="btn btn-lg btn-primary buttons">PREVIOUS</a>
            <?php endif; ?>
            <?php if($page < $lastPage): ?>
                <a href="?page=<?= $nextPage ?>" class="btn btn-lg btn-primary buttons">NEXT</a>
            <?php endif; ?>
        </div>

        <h2>Add a Park</h2>
        <div class="formdiv">
            <form class="form"type="GET" action="#">
                <div class="row">
                    <div class="col-xs-6 nopadding">
                        <input name="name" type="text" placeholder="Name" class="form-control" id="name">
                    </div>
                    <div class="col-xs-6 nopadding">
                        <input name="location" type="text" placeholder="Location" class="form-control" id="location">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 nopadding">
                        <input name="date_established" type="text" placeholder="Date Established" class="form-control" id="date_established">
                    </div>
                    <div class="col-xs-6 nopadding">
                        <input name="area_in_acres" type="text" placeholder="Area in Acres" class="form-control" id="area_in_acres">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 nopadding">
                        <textarea rows="3" name="description" type="text" placeholder="Description" class="form-control" id="description"></textarea>
                    </div>
                </div>
                <div class="centerdiv">
                    <input class="btn btn-lg btn-primary buttons" type="submit" value="SUBMIT"></p>
                </div>
            </form>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $('.fulldescription').hide();
        $('.teaser').click(function(){
            var parkId = $(this).data('id');
            $('.fulldescription[data-id="' + parkId + '"]').show();
            $(this).hide();
        });
    </script>
</body>
</html>



