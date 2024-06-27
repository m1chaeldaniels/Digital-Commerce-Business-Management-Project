<?php

require_once('database.php');
session_start();
include('header.php');

// michael daniels css IT202-01 Unit 11 Assignment mtd32@njit,edu

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $shoeCategoryID = $_POST['shoeCategory_id'];
    $shoeCode = $_POST['ShoeCode'];
    $shoeName = $_POST['shoeName'];
    $shoeDescription = $_POST['shoeDescription'];
    $shoePrice = $_POST['shoePrice'];


    $errors = array();

    $queryCheckDuplicate = 'SELECT * FROM shoes WHERE shoeCode = :shoeCode';
    $statementCheck = $db->prepare($queryCheckDuplicate);
    $statementCheck->bindValue(':shoeCode', $shoeCode);
    $statementCheck->execute();

    if ($statementCheck->rowCount() > 0) {
        $errors[] = "Duplicate shoe code. Please use a different code.";
    }

    if (empty($shoeCategoryID) || empty($shoeCode) || empty($shoeName) || empty($shoeDescription) || empty($shoePrice)) {
        $errors[] = "Please fill in all requiremnts correctly. All fields were not filled/inputted correctly";
    }


    if (empty($errors)) {
        $queryInsert = 'INSERT INTO shoes (shoeCategoryID, shoeCode, shoeName, description, price, dateAdded) 
                        VALUES (:shoeCategoryID, :shoeCode, :shoeName, :description, :price, NOW())';
        $statementInsert = $db->prepare($queryInsert);
        $statementInsert->bindValue(':shoeCategoryID', $shoeCategoryID);
        $statementInsert->bindValue(':shoeCode', $shoeCode);
        $statementInsert->bindValue(':shoeName', $shoeName);
        $statementInsert->bindValue(':description', $shoeDescription);
        $statementInsert->bindValue(':price', $shoePrice);
        $statementInsert->execute();
        $statementInsert->closeCursor();

        header('Location: shoes.php');
        exit();
    }
}

$query = 'SELECT * FROM shoeCategories ORDER BY shoeCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$shoeCategories = $statement->fetchAll();
$statement->closeCursor();


?>

<html>

<head>
    <title>Create</title>
    <link rel="stylesheet" href="shoes.css">
    <script>
    window.onload = function() {
        const form = document.getElementById("create_page");
        const errorMsg = document.getElementById("error-messages");
        const resetBtn = document.getElementById("reset-form");

        form.addEventListener("submit", function(event) {
            let errors = [];
            errorMsg.innerHTML = "";

            // Validate Shoe Code
            let shoeCode = form["ShoeCode"].value;
            if (!shoeCode || shoeCode.length < 4 || shoeCode.length > 10) {
                errors.push("Shoe Code must be between 4 and 10 characters.");
            }

            // Validate Shoe Name
            let shoeName = form["shoeName"].value;
            if (!shoeName || shoeName.length < 10 || shoeName.length > 100) {
                errors.push("Shoe Name must be between 10 and 100 characters.");
            }

            // Validate Shoe Description
            let shoeDescription = form["shoeDescription"].value;
            if (!shoeDescription || shoeDescription.length < 10 || shoeDescription.length > 255) {
                errors.push("Shoe Description must be between 10 and 255 characters.");
            }

            // Validate Shoe Price
            let shoePrice = parseFloat(form["shoePrice"].value);
            if (isNaN(shoePrice) || shoePrice <= 0 || shoePrice > 100000) {
                errors.push("Shoe Price must be a positive number and not exceed $100,000.");
            }

            // Display errors or submit form
            if (errors.length > 0) {
                event.preventDefault();
                errors.forEach(function(error) {
                    errorMsg.innerHTML += "<p>" + error + "</p>";
                });
            }
        });

        // Reset form fields
        resetBtn.addEventListener("click", function() {
            form.reset();
            errorMsg.innerHTML = "";
        });
    };
</script>

</head>

<body>
    <header>
        <h1>Create Manager</h1>
    </header>
    <main>
        <h1>Create Shoe</h1>
        <div id="error-messages"></div>
        <form action="create_page.php" method="post" id="create_page">
            <label>Shoe Category:</label>
            <select name="shoeCategory_id">
                <?php foreach ($shoeCategories as $shoeCategory) : ?>
                    <option value="<?php echo $shoeCategory['shoeCategoryID']; ?>">
                        <?php echo $shoeCategory['shoeCategoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Shoe Code:</label>
            <input type="text" name="ShoeCode"><br>
            <label>Shoe Name:</label>
            <input type="text" name="shoeName"><br>
            <label>Shoe Description:</label>
            <input type="text" name="shoeDescription"><br>
            <label>Shoe Price:</label>
            <input type="text" name="shoePrice"><br>
            <label>&nbsp;</label>
            <input type="submit" value="Create Shoe"><br>
            <label>&nbsp;</label>
            <input type="button" value="Reset" id="reset-form"><br>
        </form>





        <?php
        if (!empty($errors)) {
            echo "<div class='error-messages'>";
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
            echo "</div>";
        }
        ?>
        <p><a href="shoes.php">View Shoe List</a></p>
    </main>
    <?php include('footer.php'); ?>

</body>

</html>