<?php

define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'adlister_db');
define("DB_USER", 'adlister_user');
define("DB_PASS", 'password');

require_once 'db_connect.php';
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$truncate = 'TRUNCATE users';

$dbc->exec($truncate);

$users = [
    ['name' => 'niki', 'email' => 'niki@email.com', 'password' => 'password'],
    ['name' => 'rem', 'email' => 'rem@email.com', 'password' => 'password']
];

foreach ($users as $user) {
    $query = "INSERT INTO users(name, email, password) VALUES (
        '{$user['name']}', '{$user['email']}', '{$user['password']}')";
    $dbc->exec($query);
    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;   
}