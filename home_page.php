<html>
<head>
<title>MD's Best Kicks</title>
  <link rel="stylesheet" href="styles.css">
  
</head>
<body>
    <?php 
    session_start();
    include ('header.php');   // michael daniels css IT202-01 Unit 9 Assignment mtd32@njit,edu
    

    ?>
  
  <main>
    <div class ="store-description">
      <h1>Welcome to Michael's Best Kicks!</h1>

      <p>
      Founded in October 2023, by Michael Daniels while a student at NJIT, Michael's Best Kicks was born to be dedicated to providing high-quality footwear for every occasion.
        We strive to provide options that inspire style and have you walking out the house! It is our 
      biggest mission to please the customer. 
      Visit us at Michael's Best Kicks, 351 Lexington Ave, Clifton, NJ to find the perfect pair!
      </p>
    </div>
  
    <div class="gallery">
    <figure>
    <img style="  margin: 30px; padding: 5px;" src="./Images/nikemaxes.jpeg" alt="NIKES" height="100">
        <figcaption>Nikes</figcaption>
    </figure>

    <figure>
    <img style="  margin: 30px; padding: 5px;" src="./Images/jordan1s.jpeg" alt="JORDANS" height="100">
        <figcaption>Jordans</figcaption>
    </figure>

    <figure>
    <img style="  margin: 30px; padding: 5px;" src="./Images/1.jpeg" alt="LEBRONS" height="100">
        <figcaption>Lebrons</figcaption>
    </figure>

    <figure>
    <img style="  margin: 30px; padding: 5px;" src="./Images/Newbalances.jpeg" alt="New Balances" height="100">
        <figcaption>New-Balances</figcaption>
    </figure>
</div>
  </main>

  <?php include ('footer.php'); ?>

</body>
</html>