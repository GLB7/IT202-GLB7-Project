<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php
  session_start();
  $_SESSION = [];  
  session_destroy(); 
  $login_message = 'You have been logged out.';
  header("Location: login_page.php?login_message=".urlencode($login_message)); 
  exit();
?>