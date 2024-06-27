<header>
    <div class="logo">
        <img src="images/justheM1.jpg" alt="Michael's Best Kicks Logo">
    </div>

    <h1>Michael's Best Kicks</h1>
    <h2>Michael's Best Kicks, 351 Lexington Ave, Clifton, NJ, 07011</h2>
    <nav>
        <ul>
            <?php
            session_start();
            if (isset($_SESSION['is_valid_admin'])) {
                echo '<li><a href="home_page.php">Home</a></li>';
                echo '<li><a href="shoes.php">Shoe List</a></li>';
                echo '<li><a href="shipping.php">Shipping</a></li>';
                echo '<li><a href="create_page.php">Create</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>'; // Add a logout link
            } else {
                echo '<li><a href="home_page.php">Home</a></li>';
                echo '<li><a href="shoes.php">Shoe List</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
            }
// Michael Daniels IT 202 Unit 9 Assignment, mtd32njit.edu

            ?>
        </ul>
    </nav>

    <?php
    if (isset($_SESSION['is_valid_admin'])) {
        if (isset($_SESSION['emailAddress']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
            echo 'Welcome, ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . ' (' . $_SESSION['emailAddress'] . ')';
        }
    }
    ?>
</header>
