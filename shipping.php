<html> 
<head>
<title>Shipping | Michael's Best Kicks</title>
  <link rel="stylesheet" href="styles.css">
 
</head>
<body>
    <?php 
    session_start();
    include ('header.php');   //michael daniels css IT202-01 Unit 11 Assignment mtd32@njit,edu
    
    ?>
  
  <main>
    <h1>Shipping Information</h1>
    <form action="process_shipping.php" method="post">
      <h2> Customer Information </h2>
            <label>First Name:</label>
            <input type="text" name="first_Name"/>
            <br>
            <label>Last Name:</label>
            <input type="text" name="last_Name"/>
            <br>
            <label>Street Address:</label>
            <input type="text" name="street_Address"/>
            <br>
            <label>City:</label>
            <input type="text" name="city"/>
            <br>
            <label>State:</label>
            <input type="text" name="state"/>
            <br>
            <label>Zip Code:</label>
            <input type="text" name="zip_Code"/>
            <br>
            <h2> Package Information </h2>
            <label>Dimensions of the package(in):</label>
            <input type="text" name="dimensions"/>
            <br>
            <label>Order Number:</label>
            <input type="text" name="order_number"/>
            <br>
            <label>Value of Order:</label>
            <input type="text" name="declared_value"/>
            <br>
            <label>Ship Date:</label>
            <input type="text" name="ship_date"/>
            <br>
      <button type="submit">Submit</button>
    </form>
  </main>

  <?php

if (!empty($_SESSION['shipping_errors'])) {
    foreach ($_SESSION['shipping_errors'] as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
    
    unset($_SESSION['shipping_errors']);
}
?>

  <?php include ('footer.php'); ?>

</body>
</html>