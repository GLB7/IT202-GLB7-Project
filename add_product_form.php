<!-- 
Giovani Bergamasco
3/13/2024
IT - 202 002
Phase 3 Assignment: Create SQL Data using PHP
glb7@njit.edu  
-->
<?php
session_start();
if (!isset($_SESSION['is_valid_admin'])) {
    $login_message = "You must log in to access that page.";
    header("Location: login_page.php?login_message=".urlencode($login_message));
    exit();
}
?>

<?php
require_once('database_njit.php'); 
$query = 'SELECT *
          FROM bookCategories
          ORDER BY bookCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

$error = filter_input(INPUT_GET, 'error');
$success = filter_input(INPUT_GET, 'success')
?>

<!DOCTYPE html>
<html>
    <head>
            <title>The Bibliophile's Commune Create Page</title>
            <link rel="icon" href="images/store_logo.png" type="image/png"/>
            <link rel="stylesheet" href="add_product_form.css"/>
        </head>
    <body>
        <?php include ('header.php');?>
        <main>
        <div id="create-book">Create Book</div>
        
        <form action="add_product.php" method="post" id="add_product_form">  <!-- Could add client side validation in the future -->

        <?php if (!empty($error)) : ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <p class="success"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <label>Category:</label>
            <select name="category_id"> <!--This is a drop down menu in html-->
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['bookCategoryID']; ?>"> <!--These are the options in the drop down menu --> <!--Value is id in database table -->
                    <?php echo $category['bookCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
        <label>Code:</label>
            <input type="text" name="code" placeholder="e.g., F_TGG"><br>
        <label>Name:</label>
            <input type="text" name="name" placeholder="e.g., The Great Gatsby"><br>
        <label>Description:</label>
            <input type="text" name="description" placeholder="e.g., A novel written by American author F. Scott Fitzgerald"><br>
        <label>Pages:</label>
            <input type="text" name="pages" placeholder="e.g., 208"><br>
        <label>Price:</label>
            <input type="text" name="price" placeholder="e.g., 13.99"><br>
        <input type="submit" value="Add Book"><br>
        </form>
        </main>
        <?php include ('footer.php');?>
</html>