<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php
require_once('database_njit.php'); 

function addbookmanager($db, $email, $password, $firstName, $lastName) { //$db parameter added, since wouldn't be available in function scope.
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $dateCreated = date('Y-m-d H:i:s');
    $query = 'INSERT INTO bookManagers (emailAddress, password, firstName, lastName, dateCreated)
              VALUES (:email, :password,:firstName, :lastName, :dateCreated)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':dateCreated', $dateCreated);
    $statement->execute();
    $statement->closeCursor();
}

// This is to be run only one time. Do not visit page anymore. 
addbookmanager($db, 'glb7@njit.edu', 'password', 'Gio', 'Bergamasco');
addbookmanager($db, 'john@gmail.com', 'john123', 'John', 'Doe');
addbookmanager($db, 'tom@yahoo.com', 'topsecret', 'Tom', 'Cruise');
?>