<?php
/*
$driver = "mysql";
$host = "localhost";
$db_name = "dinamic-site";
$db_user = "root";
$db_pass = "";
$charset = "utf8";

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$dsn = "mysql:host=localhost:3306;dbname=dinamic-site;charset=UTF8";
$pdo = new PDO($dsn, 'root', 'mysql');
*/


/*
$host = "localhost";
$data = "dinamic-site";
$user = "root";
$pass = "mysql";

$connection = new mysqli($host, $user, $pass, $data );
if ($connection->connect_error) die("Error connection");

*/
/*
$servername = "localhost";
$username = "root";
$password = "mysql";

$conn = new mysqli($servername, $username, $password );

if($conn->connect_error) {
die("Connection filed: " . $conn->connect_error);
}
echo "Connection successfully";



/*
     // ПРОЦЕДУРНЕ ПІДКЛЮЧЕННЯ
$servername = "localhost";
$username = "root";
$password = "mysql";

$conn = mysqli_connect ($servername, $username, $password );

if(!$conn) {
    die("Connection filed: " . mysqli_connect_error());
}
echo "Connection successfully";

*/

/*

$servername = "localhost";
$username = "root";
$password = "mysql";

$conn = new mysqli($servername, $username, $password );

if($conn->connect_error) {
die("Connection filed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS din_site";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

*/


$driver = 'mysql';
$host = 'localhost';
$db_name = 'dinamic-site';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", "$db_user", "$db_pass", $options);
} catch(PDOException $error) {
    die('Ошибка при подключении к базе данных');

}