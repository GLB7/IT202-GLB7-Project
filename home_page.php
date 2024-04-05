<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

 <html>
    <head>
        <title>The Bibliophile's Commune</title>
        <link rel="icon" href="images/store_logo.png" type="image/png"/>
        <link rel="stylesheet" href="home_page.css"/>
    </head>
    <body>
        <?php include ('header.php');?>
        <main>
            <h2>About Us</h2>
            <p id="about_us_text">Established in 2003 by Ned Flanders, The Bibliophile's Commune was born out of Ned's personal quest for books that resonated with his unique tastes. Frustrated by the challenge of finding books he truly enjoyed, Ned envisioned a haven for readers seeking a diverse selection. The store is meticulously curated, encompassing Fiction Novels, Self-Help Books, Cookbooks, Science Fiction series, and Biographies, reflecting Ned's commitment to catering to a broad spectrum of literary preferences. With a passion for fostering a community of avid readers, the Bibliophile's Commune goes beyond being a bookstore; it is a space where individuals can discover, connect, and indulge in the transformative power of literature. Ned's vision extends beyond mere commerce, aiming to create an environment where everyone can find their next favorite read. </p>
            <h2>Our Selection</h2>
            <nav>
                <div class="genres">
                    <div class="row1">
                        <p>Fiction Novels</p>
                        <img src="images/fiction_book.png" alt="fiction_book.png" width="100"/>
                    </div>
                    <div class="row1">
                        <p>Self-Help</p>
                        <img src="images/self-help_book.png" alt="self-help_book.png" width="100"/>
                    </div>
                    <div class="row1">
                        <p>Cookbooks</p>
                        <img src="images/cook_book.png" alt="cook_book.png" width="100"/>
                    </div>
                    <div class="row2" style="margin-left: 15%;">
                        <p>Science Fiction</p>
                        <img src="images/science_fiction_book.png" alt="science_fiction_book.png" width="100"/>
                    </div>
                    <div class="row2">
                        <p>Biography</p>
                        <img src="images/biography_book.png" alt="science_fiction_book.png" width="100"/>
                    </div>
                </div>
            </nav>
        </main>
    </body>
    <?php include ('footer.php');?>
</html>