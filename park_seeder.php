<?php

define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'parks_db');
define("DB_USER", 'parks_user');
define("DB_PASS", 'password');

require_once 'db_connect.php';
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$truncate = 'TRUNCATE national_parks';

$dbc->exec($truncate);

$parks = [
    ['name' => 'Acadia', 'location' => 'ME', 'date_established' => '1919-02-26', 'area_in_acres' => 47389.67, 'description' => 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes.'],
    ['name' => 'Arches', 'location' => 'UT', 'date_established' => '1988-10-31', 'area_in_acres' => 9000.00, 'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch.'],
    ['name' => 'Badlands', 'location' => 'SD', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94, 'description' => 'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies.'],
    ['name' => 'Big Bend', 'location' => 'TX', 'date_established' => '1944-06-12', 'area_in_acres' => 801163.21, 'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert.'],
    ['name' => 'Carlsbad Caverns', 'location' => 'NM', 'date_established' => '1930-05-14', 'area_in_acres' => 46766.45, 'description' => 'Carlsbad Caverns has 117 caves, the longest of which is over 120 miles (190 km) long.'],
    ['name' => 'Crater Lake', 'location' => 'OR', 'date_established' => '1902-05-22', 'area_in_acres' => 183224.05, 'description' => 'Crater Lake lies in the caldera of an ancient volcano called Mount Mazama that collapsed 7,700 years ago.'],
    ['name' => 'Denali', 'location' => 'AL', 'date_established' => '1917-02-26', 'area_in_acres' => 4740911.72, 'description' => 'Centered around Denali, the tallest mountain in North America, Denali is serviced by a single road leading to Wonder Lake.'],
    ['name' => 'Everglades', 'location' => 'FL', 'date_established' => '1934-05-30', 'area_in_acres' => 1508537.90, 'description' => 'The Everglades are the largest subtropical wilderness in the United States.'],
    ['name' => 'Glacier', 'location' => 'MT', 'date_established' => '1910-05-11', 'area_in_acres' => 1013572.41, 'description' => 'The U.S. half of Waterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks'],
    ['name' => 'Olympic', 'location' => 'WA', 'date_established' => '1938-06-29', 'area_in_acres' => 922650.86, 'description' => 'Situated on the Olympic Peninsula, this park straddles a diversity of ecosystems from Pacific shoreline to temperate rainforests to the alpine slopes of Mount Olympus.']
];

foreach ($parks as $park) {
    $query = "INSERT INTO national_parks(name, location, date_established, area_in_acres, description) VALUES (
        '{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}', '{$park['description']}')";
    $dbc->exec($query);
    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;   
}