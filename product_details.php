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
<?php
require_once('database_njit.php');
$book_id = filter_input(INPUT_GET, 'book_id', FILTER_VALIDATE_INT);
$query = 'SELECT * FROM books
          WHERE bookID = :book_id'; 
$statement = $db->prepare($query); 
$statement->bindValue(':book_id', $book_id);
$statement->execute(); 
$book = $statement->fetch();
$statement->closeCursor();

?>
<html>
    <head>
        <title>The Bibliophile's Commune Product Details</title>
        <link rel="icon" href="images/store_logo.png" type="image/png"/>
        <link rel="stylesheet" href="product_details.css"/>
    </head>
    <body>
    <?php include ('header.php');?>
        <main>
        <div id = "book-NA"><?php 
        if (!is_array($book)) {
            echo "No book found with the given ID";
            exit();
        }?></div>
        <div id="book-details">Book Details</div>
        <div style="display: flex; padding-left: 10%;">
            <img id = "book-image" src="images/books/<?php echo htmlspecialchars($book['bookCode']); ?>.jpg" alt="Book Image" width="200"/>
            <div id="book-info" style="margin-left: 40px;">
                <p><strong>Title: </strong><?php echo $book['bookName']; ?></p> 
                <p><strong>Code: </strong><?php echo $book['bookCode']; ?></p> 
                <p><strong>ID: </strong><?php echo $book['bookID']; ?></p>
                <p><strong>Description: </strong><?php echo $book['description']; ?></p>
                <p><strong>Pages: </strong><?php echo $book['bookPages']; ?></p> 
                <p><strong>Price: </strong><?php echo $book['price']; ?></p>
                <p><strong>Date Added: </strong><?php echo date('Y-m-d', strtotime($book['dateCreated'])); ?></p>
            </div>
        </div>
        <script>
                // JavaScript to change width on mouseover
                document.getElementById("book-image").addEventListener("mouseover", function() {
                    this.style.width = "250px"; // Adjust width as needed
                });
                // Reset width on mouseout (optional)
                document.getElementById("book-image").addEventListener("mouseout", function() {
                    this.style.width = "200px"; // Reset width to original
                });
            </script>
        </main>
    </body>
    <?php include ('footer.php');?>
</html>