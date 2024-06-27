<?php
    
    session_start();
    $_SESSION = [];        
    session_destroy();
    header("Location: home_page.php");      
    unset($_SESSION['is_valid_admin']);
    exit();

    
        


?>

<?php //Michael Daniels, IT202 Unit 11 Assignment, mtd32@njit.edu  ?>
