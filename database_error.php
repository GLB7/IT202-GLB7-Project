<!-- 
Giovani Bergamasco
3/1/2024
IT - 202 002
Phase 2 Assignment: Read SQL Data using PHP
glb7@njit.edu 
 -->
<html>
  <head>
    <title>The Bibliophile's Commune</title>
    <style>
      body {
        background-color: #222831;
        color: #eeeeee;
        font-family: Arial, sans-serif;
      }
      
      main {
        margin: 10px auto;
        width: 50%;
        border: 1px solid #393e46;
        padding: 20px;
        background-color: #393e46;
        border-radius: 5px;
      }
      h1 {
        color: #0092ca;
      }
    </style>
  </head>
  <body>
  <?php include ('header.php');?>
    <main>
      <h1>Database Error</h1>
      <p>Error message: <?php echo $error_message; ?></p>
    </main>
  </body>
  <?php include ('footer.php');?>
</html>
