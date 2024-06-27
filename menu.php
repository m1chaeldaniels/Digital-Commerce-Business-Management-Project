<?php


    session_start();
    if(isset($_SESSION['is_valid_admin'])) {
        echo '<script>window.location.href = "home_page.php";</script>';
?>
    <p>
        <a href="logout.php">Logout</a>
    </p>
<?php exit();} else { ?>
    <p>
        <a href="login.php">Login</a>
    </p>

<?php } ?>