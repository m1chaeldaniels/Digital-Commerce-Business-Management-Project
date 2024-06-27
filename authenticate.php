<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('admin_db.php');
require_once('database.php');

$queryInfo = 'SELECT * FROM shoeCategories';
$statement3 = $db->prepare($queryInfo);
$statement3->execute();
$info = $statement3->fetchAll();
$statement3->closeCursor();

// Michael Daniels IT 202 Unit 11 Assignment, mtd32njit.edu



$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

        if(is_valid_admin_login($email, $password)) {
            $_SESSION['is_valid_admin'] = true;


            $query = 'SELECT * FROM shoeManagers WHERE emailAddress = :email';
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
    
            $_SESSION['emailAddress'] = $row['emailAddress'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];


            header("Location: home_page.php");
            exit();

        } else {


            if($email == NULL && $password == NULL) {
                $login_message = 'You must login to view this page.';
            } else {
                $login_message = 'Invalid Credentials.';
            }

            include('login.php');
        }


?>

