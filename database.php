<?php
// slide 24
// michael daniels css IT202-01 Unit 11 Assignment mtd32@njit,edu

$local_dsn ='mysql:host=localhost;dbname=my_guitar_shop1';
$local_username = 'mgs_user';
$local_password = 'pa55word';

$njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=mtd32';
$njit_username = 'mtd32';
$njit_password = 'ITnjit202!';

$dsn = $njit_dsn;
$username = $njit_username;
$password = $njit_password;

try {
    $db = new PDO($dsn, $username, $password);
   
}
catch (PDOException $exception) {
    $error_message = $exception->getMessage();
    include("database_error.php");
}

function getDB()
{
    global $db; 
    return $db;
}
?>
