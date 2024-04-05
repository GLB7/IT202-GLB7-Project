<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php 
$login_message = filter_input(INPUT_GET, 'login_message');
?>
<html>
    <head>
        <title>The Bibliophile's Commune Login</title>
        <link rel="icon" href="images/store_logo.png" type="image/png"/>
        <link rel="stylesheet" href="login_page.css"/>
    </head>
    <body>
        <?php include ('header.php');?>
        <main>
        <div id="login">Login</div>
        <p id="login_message" class="<?php echo htmlspecialchars($login_message_type); ?>"><?php echo htmlspecialchars($login_message); ?></p>
        <form action="authenticate.php" method="post">
            <label>Email:</label>
            <input type="text" name="email" value="">
            <br>
            <label>Password:</label>
            <input type="password" name="password" value=""> <!-- type password makes it so when you type the password it doesn't show -->
            <br>
            <input type="submit" value="Login">
        </form>
        </main>
    </body>
    <?php include ('footer.php');?>
</html>