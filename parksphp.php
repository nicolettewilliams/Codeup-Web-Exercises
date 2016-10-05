<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require_once 'db_connect.php';
require_once 'Input.php';

$limit = 4;
$errors = array();
$lastPage = ceil(($dbc->query('SELECT count(*) FROM national_parks')->fetchColumn())/$limit);
$page = Input::has('page')? Input::get('page') : 1;
$nextPage = $page + 1; 
$previousPage = $page - 1; 
$offset = ($page - 1) * 4; //page number determines how much offset there is
$parks = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :offset");
$parks->bindValue(':limit', $limit, PDO::PARAM_INT);
$parks->bindValue(':offset', $offset, PDO::PARAM_INT);
$parks->execute();
$parkInfo = $parks->fetchAll(PDO::FETCH_ASSOC);
$newPark = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

if (Input::has('name') && Input::has('location') && Input::has('date_established') && Input::has('area_in_acres') && Input::has('description')){
    try{
        $newPark->bindValue(':name', Input::getString('name'), PDO::PARAM_STR);
    }catch(InvalidArgumentException $e){
        $errors[] = $e->getMessage();
    }catch(OutOfRangeException $e){
        $errors[] = $e->getMessage();
    }catch(DomainException $e){
        $errors[] = $e->getMessage();
    }catch(LengthException $e){
        $errors[] = $e->getMessage();
    }catch(Exception $e){
        $errors[] = $e->getMessage();
    }
    try{
        $newPark->bindValue(':location',  Input::getString('location'),  PDO::PARAM_STR);
    }catch(Exception $e){
        $errors[] = $e->getMessage();
    }
    try{
        $newPark->bindValue(':date_established',  Input::getDate('date_established'),  PDO::PARAM_STR);
    }catch(Exception $e){
        $errors[] = $e->getMessage();
    }
    try{
        $newPark->bindValue(':area_in_acres',  Input::getNumber('area_in_acres'),  PDO::PARAM_INT);
    }catch(Exception $e){
        $errors[] = $e->getMessage();
    }
    try{
        $newPark->bindValue(':description',  Input::getString('description'),  PDO::PARAM_STR);
    }catch(Exception $e){
        $errors[] = $e->getMessage();
    }
    if(empty($errors)){
        $newPark->execute();
    }
}