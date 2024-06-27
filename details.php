<!DOCTYPE html>
<html>
<head>
    <title>Shoe Details</title>
    <link rel="stylesheet" href="shoes.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#shoe-image').hover(
                function() {
                    var hoverSrc = 'images/' + $(this).data('hover-src') + '.jpeg';
                    $(this).attr('src', hoverSrc);
                },
                function() {
                    var originalSrc = 'images/' + $(this).data('original-src') + '.jpeg';
                    $(this).attr('src', originalSrc);
                }
            );
        });
    </script>
</head>
<body>

<?php
require('database.php');
include('header.php');
// Michael Daniels IT 202 Unit 11 Assignment, mtd32njit.edu 
$shoeID = filter_input(INPUT_GET, 'shoe_id', FILTER_VALIDATE_INT);

if ($shoeID !== false && $shoeID != null) {
    $query = 'SELECT * FROM shoes WHERE shoeID = :shoeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':shoeID', $shoeID);
    $statement->execute();
    $shoe = $statement->fetch();
    $statement->closeCursor();

    if ($shoe) {
        echo '<div class="shoe-details">';
        echo '<h1>' . htmlspecialchars($shoe['shoeName']) . '</h1>';
        echo '<img id="shoe-image" src="images/' . $shoeID . '.jpeg" data-original-src="' . $shoeID . '" data-hover-src="' . $shoeID . '_hover">';

        // Displaying additional details
        echo '<p class="shoe-detail"><strong>Code:</strong> ' . htmlspecialchars($shoe['shoeCode']) . '</p>';
        echo '<p class="shoe-detail"><strong>Description:</strong> ' . htmlspecialchars($shoe['description']) . '</p>';
        echo '<p class="shoe-detail"><strong>Price:</strong> $' . htmlspecialchars($shoe['price']) . '</p>';
        echo '</div>';
    } else {
        echo '<p>Shoe record not found.</p>';
    }
} else {
    echo '<p>Invalid shoe ID.</p>';
}

include('footer.php');
?>

</body>
</html>
