<!-- 
Giovani Bergamasco
3/13/2024
IT - 202 002
Phase 3 Assignment: Create SQL Data using PHP
glb7@njit.edu  
-->

<!--
// --
// -- Table structure for table `books`
// --
// `bookID` int(11) NOT NULL,
// `bookCategoryID` int(11) NOT NULL,
// `bookCode` varchar(10) NOT NULL,
// `bookName` varchar(255) NOT NULL,
// `description` text NOT NULL,
// `bookPages` int(11) NOT NULL,
// `price` decimal(10,2) NOT NULL,
// `dateCreated` datetime NOT NULL 
-->

<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$pages = filter_input(INPUT_POST, 'pages', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$dateCreated = date('Y-m-d H:i:s');

// Check for empty fields
if ($category_id === NULL || $category_id === '' || $code === NULL || $code === '' || $name === NULL || $name === '' || $description === NULL || $description === '' || $pages === NULL || $pages === '' || $price === NULL || $price === '') {
    $error = "All fields are required.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
}

// Validate inputs
if ($category_id == FALSE || $price == FALSE || $pages == FALSE) {
    $error = "Invalid book data. Check all fields and try again.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
}

// Validate bookCode
if (!preg_match("/^[a-zA-Z0-9_!@#$%^&*()]{1,10}$/", $code)) {
    $error = "Invalid book code. Book code should be alphanumeric (underscores allowed) and up to 10 characters long.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
}

// Validate bookName
if (strlen($name) > 255) {
    $error = "Invalid book name. Book name should not exceed 255 characters.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
}

// Validate bookPages
if ($pages <= 0) {
    $error = "Invalid number of pages. The book should have at least one page.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
}

// Validate price
if ($price <= 0) {
    $error = "Invalid price. The price should be greater than zero.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
}
elseif (!preg_match("/^\d+(\.\d{1,2})?$/", $price)) {
    $error = "Invalid price. The price should be a number with up to two decimal places.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
}

// Check for duplicate product code
require_once('database_njit.php');
$query = 'SELECT * FROM books WHERE bookCode = :code';
$statement = $db->prepare($query);
$statement->bindValue(':code', $code);
$statement->execute();
$existing_product = $statement->fetch();
$statement->closeCursor();
if ($existing_product) {
    $error = "Product code already exists. Please enter a unique product code.";
    header("Location: add_product_form.php?error=" . urlencode($error));
    exit;
} else {
    // Add the product to the database  
    $query = 'INSERT INTO books
                 (`bookCategoryID`, `bookCode`, `bookName`, `description`, bookPages, price, `dateCreated`)
              VALUES
                 (:category_id, :code, :name, :description, :pages, :price, :dateCreated)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':pages', $pages);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':dateCreated', $dateCreated);
    $success = $statement->execute();
    $statement->closeCursor();
    
    if ($success) {
        header("Location: add_product_form.php?success=" . urlencode("Book added successfully."));
    } else {
        header("Location: add_product_form.php?error=" . urlencode("Failed to add the book."));
    }
    exit;
}
?>