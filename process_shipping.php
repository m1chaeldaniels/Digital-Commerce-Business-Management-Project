<?php
include('header.php');

function displayErrors($errors) {
  if (!empty($errors)) {
      $_SESSION['shipping_errors'] = $errors;
      header('Location: shipping.php');
      exit();
  }
}

  // // Michael Daniels IT 202 Unit 11 Assignment, mtd32njit.edu

// creating error cases and also what happens when the submit button is pressed 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fromAddress = "Michael's Best Kicks, 351 Lexington Ave, Clifton, NJ, 07011";
  $toAddress = htmlspecialchars($_POST['first_Name'] . ' ' . $_POST['last_Name'] . ', ' . $_POST['street_Address'] . ', ' . $_POST['city'] . ', ' . $_POST['state'] . ', ' . $_POST['zip_Code']);
  $Dimensions = htmlspecialchars($_POST['dimensions']); 
  $declaredValue = htmlspecialchars($_POST['declared_value']); 
  $shippingCompany = 'FedEx'; 
  $shippingClass = 'Priority Mail'; 
  $trackingNumber = "856478581"; 
  $orderNumber = htmlspecialchars($_POST['order_number']); 
  $shipping = htmlspecialchars($_POST['ship_date']); 

  $errors_message = [];


  if (empty($_POST['first_Name'])) {
      $errors_message[] = "First Name is required.";
  }
 
  if (empty($_POST['last_Name'])) {
    $errors_message[] = "Last Name is required.";
}

if (empty($_POST['city'])) {
  $errors_message[] = "City is required.";
}

if (empty($_POST['state'])) {
  $errors_message[] = "State is required.";
}

if (empty($_POST['zip_Code'])) {
  $errors_message[] = "Zipode is required.";
}


  if ($declaredValue > 150) {
      $errors_message[] = "Value may not exceed $150.";
  }

  if ($Dimensions > 36) {
      $errors_message[] = "Dimensions may not exceed 36 inches.";
  }

  displayErrors($errors_message);


}

?>


<html>
<head>
 
  <link rel="stylesheet" href="styles.css">
  <title>Shipping for Michael's Best Kicks!</title>
</head>
<body>
  <main>
    <h1>Shipping Details</h1>

    <div class="shipping-label">
      <p><strong>From Address:</strong> <?php echo $fromAddress; ?></p>
      <p><strong>To Address:</strong> <?php echo $toAddress; ?></p>
      <p><strong>Package Dimensions:</strong> <?php echo $Dimensions; ?></p>
      <p><strong>Package Declared Value:</strong> $<?php echo $declaredValue; ?></p>
      <p><strong>Shipping Company:</strong> <?php echo $shippingCompany; ?></p>
      <p><strong>Shipping Class:</strong> <?php echo $shippingClass; ?></p>
      <p><strong>Tracking Number:</strong> <img class="barcode" src="images/barcode.png" alt="Barcode"></p> <?php echo $trackingNumber; ?></p>
      <p><strong>Order Number:</strong> <?php echo $orderNumber; ?></p>
      <p><strong>Ship Date:</strong> <?php echo $shipping; ?></p>
    </div>
  </main>

  <?php

  include('footer.php');
  ?>
</body>
</html>