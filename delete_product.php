<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php
    require_once('database_njit.php');

    // get IDs
    $product_id = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'bookCategory_id', FILTER_VALIDATE_INT);

    if ($product_id != FALSE && $category_id != FALSE){
        $query = 'DELETE FROM books WHERE bookID = :book_id'; // :var is like a sql variable when you need to pass info from user

        $statement = $db->prepare($query);
        $statement->bindValue(':book_id', $product_id);
        $success = $statement->execute();
        $statement->closeCursor();
    }

    header("Location: product_page.php?category_id=".$category_id);
    exit;
?>