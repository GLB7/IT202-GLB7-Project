<!-- 
Giovani Bergamasco
4/18/2024
IT - 202 002
Phase 5 Assignment: Read SQL Data with PHP and JavaScript
glb7@njit.edu  
-->
<?php
session_start();
?>

 <?php require_once('database_njit.php');   // Using NJIT Database
 // Get category ID
 $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
 if ($category_id == NULL || $category_id == FALSE) {
     $category_id = 1;
 }
 // Get name for selected category
$queryCategory = 'SELECT * FROM bookCategories
WHERE bookCategoryID = :category_id'; // : is similar to $ in php. It's a variable.
$statement1 = $db->prepare($queryCategory); //$DB is the pdo object | also the -> is similar to . from java (it calls a method on that object) // Step 1 Create
$statement1->bindValue(':category_id', $category_id); // replaces :category_id with whatever is in $category_id
$statement1->execute(); // Execute, similar to hitting the go button in sql  //Step 2 Execute
$category = $statement1->fetch(); // Fetch results  // Step 3 Fetch
$category_name = $category['bookCategoryName'];
$statement1->closeCursor(); // Step 4 Close Cursor

// Get all categories
$queryAllCategories = 'SELECT * FROM bookCategories
             ORDER BY bookCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll(); // Fetch give you 1d array FetchAll will give you a 2D array
$statement2->closeCursor();
 
// Get products for selected category
$queryProducts = 'SELECT * FROM books
          WHERE bookCategoryID = :category_id -- category get replaced here 
          ORDER BY bookID';
$statement3 = $db->prepare($queryProducts); // Every single query needs a seperate pdo object
$statement3->bindValue(':category_id', $category_id); // tells to replace category in sql with php category
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();

 ?>
 <html>
    <head>
        <title>The Bibliophile's Commune Product Page</title>
        <link rel="icon" href="images/store_logo.png" type="image/png"/>
        <link rel="stylesheet" href="product_page.css"/>
    </head>
    <body>
        <?php include ('header.php');?>
        <main>
        <div id="book-list">Book List</div>
        <aside class="categories-list">
            <!-- display a list of categories -->
            <div id="categories">Book Categories</div>
            <nav>
            <ul style="list-style-type: none; padding: 0;">
                <?php foreach ($categories as $category) : ?>
                <li>
                <a class="categories-text" href="?category_id=<?php echo $category['bookCategoryID']; ?>"> 
                <?php echo $category['bookCategoryName']; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            </nav>       
        </aside>
        <section>
            <!-- display a table of products -->
            <div id="category_name"><?php echo $category_name; ?></div>
            <table>
                <tr> <!-- first table row (this is just the header to describe the content) -->
                    <th>Code</th>
                    <th>Name</th> <!-- th table header -->
                    <th>Description</th>
                    <th>Pages</th>
                    <th>Price</th>
                    <?php if (isset($_SESSION['is_valid_admin'])) {echo '<th></th>';}?>
                </tr>

                <?php foreach ($products as $product) : ?>
                <tr> <!-- subsequent rows with actual information about database -->
                    <td><a id="code" href="product_details.php?book_id=<?php echo $product['bookID']; ?>">
                        <?php echo $product['bookCode']; ?></a></td>
                    <td><?php echo $product['bookName']; ?></td> <!-- th table data-->
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['bookPages']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <script>
                    function confirmDelete() {
                        const confirmDelete = confirm("Are you sure you want to delete this book?");
                        if(confirmDelete) {
                            console.log(confirmDelete);
                            return true;
                        }
                        return false;
                     }
                    </script>
                    <?php
                    if (isset($_SESSION['is_valid_admin'])) {
                        echo '<td>';
                        echo '<form action="delete_product.php" method="post">';
                        echo '<input type="hidden" name="book_id" value="'.$product['bookID'].'"/>';
                        echo '<input type="hidden" name="bookCategory_id" value="'.$product['bookCategoryID'].'"/>';
                        echo '<input type="submit" value="Delete" onclick="return confirmDelete();"/>';
                        echo '</form>';
                        echo '</td>';
                    }
                    ?>
                </tr>
                <?php endforeach; ?>      
            </table>
        </section>
        </main>
    </body>
    <?php include ('footer.php');?>
</html>

