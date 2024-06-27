<?php
require_once('database.php');

$shoeID = filter_input(INPUT_POST, 'shoeID', FILTER_VALIDATE_INT);

// Delete the shoe from the database
if ($shoeID !== false) {
    $query = 'DELETE FROM shoes WHERE shoeID = :shoeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':shoeID', $shoeID);
    $success = $statement->execute();
    $statement->closeCursor();

    header('Location: shoes.php');
    exit;



}
// Michael Daniels IT 202 Unit 11 Assignment, mtd32njit.edu 

?> 
