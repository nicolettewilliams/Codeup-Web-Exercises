<?PHP
define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'adlister_db');
define("DB_USER", 'adlister_user');
define("DB_PASS", 'password');

require_once 'db_connect.php';
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dropTableIf = "DROP TABLE IF EXISTS users";

$dbc->exec($dropTableIf);


$addTable = "CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(30) NOT NULL,
    PRIMARY KEY (id))";

$dbc->exec($addTable);