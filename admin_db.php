<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php
require_once('database_njit.php');

function is_valid_admin_login($email, $password) {
  $db = getDB();
  $query = 'SELECT password FROM bookManagers WHERE emailAddress = :email';
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $row = $statement->fetch();
  $statement->closeCursor();  
  if ($row === false) {
    return false;
  } else {
    $hash = $row['password'];
    return password_verify($password, $hash); // Checks if clear text password matches the hash password
  }
}
?>