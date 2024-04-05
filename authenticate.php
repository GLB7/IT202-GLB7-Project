<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php
require_once('admin_db.php');
// initialize accessing $_SESSION
session_start();

// Get the content the user typed from form
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// Check if their input was valid
if (is_valid_admin_login($email, $password)) {
    // valid login!
    $_SESSION['is_valid_admin'] = true;

    $query = "SELECT firstName, lastName, emailAddress FROM bookManagers WHERE emailAddress = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    $fullName = $user['firstName'] . ' ' . $user['lastName'];
    $email = $user['emailAddress'];

    $_SESSION['fullName'] = $fullName;
    $_SESSION['email'] = $email;

    // redirect logged in user to default page
    include('home_page.php');
  } else {
    if ($email == NULL && $password == NULL) {
    $login_message ='You must login to continue.';
    } 
    else {
    $login_message = 'Invalid credentials.';
    }
    header("Location: login_page.php?login_message=".urlencode($login_message));
    exit();
  }
?>