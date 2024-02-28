<!-- 
Giovani Bergamasco
3/1/2024
IT - 202 002
Phase 2 Assignment: Read SQL Data using PHP
glb7@njit.edu 
 -->
<?php
  // Slide 24 (sort of)
  $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=glb7';
  $username = 'glb7';
  $password = 'Mysql!Gio7';

  try {
    $db = new PDO($dsn, $username, $password);
    # echo '<p>You\'re are connected to the NJIT database!</p>';
  } catch(Exception $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
  }
?>