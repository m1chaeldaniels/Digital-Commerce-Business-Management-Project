<?php include ('header.php'); // Michael Daniels IT 202 Unit 11 Assignment, mtd32njit.edu ?>

<?php
print_r($_POST);




$shoeCategory_id = filter_input(INPUT_POST,'shoeCategory_id',FILTER_VALIDATE_INT);
$shoeCode = filter_input(INPUT_POST,'shoeCode');
$shoeName = filter_input(INPUT_POST,'name');
$shoePrice = filter_input(INPUT_POST,'shoePrice',FILTER_VALIDATE_INT);



if($shoeCategory_id ==NULL || $shoeCategory_id == FALSE || $shoeCode == NULL || $shoeName == NULL || $shoePrice == NULL || $shoePrice == FALSE){
    $error = "Invalid product data. Check fields and try again.";
    echo $error;
}
else{
    require_once('database.php');
}


$query = 'INSERT INTO shoes
(shoeCategoryID,shoeCode,shoeName,shoePrice)
VALUES 
(:shoeCategory_id,:shoeCode,:shoeName,:shoePrice)';

$statement = $db->prepare($query);
$statement->bindValue(':shoeCategory_id',$shoeCategory_id);
$statement->bindValue(':shoeCode',$shoeCode);
$statement->bindValue(':shoeName',$shoeName);
$statement->bindValue(':shoePrice',$shoePrice);
$statement->execute();
$statement->closeCursor();
?>