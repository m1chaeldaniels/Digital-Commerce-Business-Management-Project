<?php
//Michael Daniels IT202 Unit 11 Assignment mtd32@njit.edu
require_once("database.php");
session_start();


function add_shoe_manager($email, $password, $firstName, $lastName) {
  $db = getDB();
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $query = 'INSERT INTO shoeManagers (emailAddress, password, firstName, lastName)
            VALUES (:email, :password, :firstName, :lastName)';
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':password', $hash);
  $statement->bindValue(':firstName', $firstName);
  $statement->bindValue(':lastName',$lastName);
  $statement->execute();
  $statement->closeCursor();
}

//add_shoe_manager("runnyJohn@gmail.com","john123","John","Runny");
//add_shoe_manager("mikeymike@gmail.com","mike123","Mikey","Mike");
//add_shoe_manager("bobduncan@gmail.com","bob123","Bob","Duncan");
?>