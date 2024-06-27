<html>
<head>
<title>MD's Best Kicks</title>
  <link rel="stylesheet" href="styles.css">
  
</head>

<body>
    <?php include ('header.php');   // Michael Daniels IT 202 Unit 11 Assignment, mtd32njit.edu
    session_start();
    ?>
  <main>
    <h1>Login</h1>
    <form action="authenticate.php" method="post">
      <label>Email:</label>
      <input type="text" name="email" value="">
      <br>
      <label>Password:</label>
      <input type="password" name="password" value="">
      <br>
      <input type="submit" value="Login">
    </form>
  </main>
  </body>
</html>