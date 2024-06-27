<?php

require('database.php');
session_start();
include('header.php');

$shoeCategory_id = filter_input(
    INPUT_GET,
    'shoeCategory_id',
    FILTER_VALIDATE_INT
);
if ($shoeCategory_id == NULL || $shoeCategory_id == FALSE) {
    $shoeCategory_id = 1;
}
/* michael daniels css IT202-01 Unit 11 Assignment mtd32@njit.edu */
$queryshoeCategory = 'SELECT * FROM shoeCategories
WHERE shoeCategoryID = :shoeCategory_id';
$statement1 = $db->prepare($queryshoeCategory);
$statement1->bindValue(':shoeCategory_id', $shoeCategory_id);
$statement1->execute();
$shoeCategory = $statement1->fetch();
$shoeCategory_name = $shoeCategory['shoeCategoryName'];
$statement1->closeCursor();



$queryAllshoeCategories = 'SELECT * FROM shoeCategories
                       ORDER BY shoeCategoryID';
$statement2 = $db->prepare($queryAllshoeCategories);
$statement2->execute();
$shoeCategories = $statement2->fetchAll();
$statement2->closeCursor();


$queryShoes = 'SELECT * FROM shoes
                  WHERE shoeCategoryID = :shoeCategory_id
                  ORDER BY shoeID';
$statement3 = $db->prepare($queryShoes);
$statement3->bindValue(':shoeCategory_id', $shoeCategory_id);
$statement3->execute();
$shoes = $statement3->fetchAll();
$statement3->closeCursor();
?>

<html>

<head>
    <link rel="stylesheet" href="shoes.css">
    <title>Michael's Best Kicks</title>
    <script>
        function confirmDelete() {
            return confirm('Are you sure?');
        }
    </script>
</head>

<body>
    <main>
        <h1>Shoe List</h1>
        <aside>
            <h2>Shoe Categories</h2>
            <nav>
                <ul>
                    <?php foreach ($shoeCategories as $shoeCategory) : ?>
                        <li>
                            <a href="?shoeCategory_id=<?php
                                                        echo $shoeCategory['shoeCategoryID']; ?>" class="category-link">
                                <?php echo $shoeCategory['shoeCategoryName']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>
        <section>
            <h2><?php echo $shoeCategory_name; ?></h2>
            <table>
                <tr>
                    <th class="header-cell">Shoe Code</th>
                    <th class="header-cell">Shoe Name</th>
                    <th class="header-cell">Shoe Description</th>
                    <th class="header-cell right">Shoe Price</th>
                    <th class="header-cell">Delete</th>
                </tr>

                <?php foreach ($shoes as $shoe) : ?>
                    <tr>
                        <td class="shoe-code">
                            <a href="details.php?shoe_id=<?php echo $shoe['shoeID']; ?>">
                                <?php echo $shoe['shoeCode']; ?>
                            </a>
                        </td>
                        <td class="shoe-name"><?php echo $shoe['shoeName']; ?></td>
                        <td class="shoe-description"><?php echo $shoe['description']; ?></td>
                        <td class="shoe-price right"><?php echo $shoe['price']; ?></td>

                        <?php if (isset($_SESSION['is_valid_admin'])) : ?>
                            <td class="delete-button">
                                <form action="delete_product.php" method="post" onsubmit="return confirmDelete()">
                                    <input type="hidden" name="shoeID" value="<?php echo $shoe['shoeID']; ?>">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        <?php endif; ?>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
    <?php include('footer.php'); ?>

</body>

</html>