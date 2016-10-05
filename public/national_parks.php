<?php  
require_once '../parksphp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>National Parks</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                    <?php foreach ($parkInfo as $park) : ?>
                    <tr>
                        <td><?= $park['name'] ?> </td>
                        <td><?= $park['location'] ?> </td>
                        <td><?= $park['date_established'] ?> </td>
                        <td><?= $park['area_in_acres'] ?> </td>
                        <td>
                            <div class='teaser' data-id="<?= $park['id'] ?>"><?= mb_strimwidth($park['description'], 0, 60, "<span class='dots'>(...)</span>"); ?></div>
                            <div class='fulldescription' data-id="<?= $park['id'] ?>"><?= $park['description'] ?> <i class="fa fa-arrow-up arrow" aria-hidden="true"></i></span></div>
                        </td>
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
        <?php if($errors): ?>
            <?php foreach($errors as $error): ?>
                <p class="errors"><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
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
    <script src="js/parks.js"></script>
</body>
</html>



