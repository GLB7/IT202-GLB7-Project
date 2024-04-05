<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<body>
    <header>
        <figure><img src="images/store_logo.png" alt="store_logo" width="100"/></figure>
        <link rel="stylesheet" href="header.css"/>
        <h1>The Bibliophile's Commune</h1>
        <?php
        if (isset($_SESSION['is_valid_admin'])) {
            echo "<div style='text-align: center; width: 100%; position: absolute; top: 90px;'><p style='font-size: medium; color: white;'>Welcome " . $_SESSION['fullName'] . " (" . $_SESSION['email'] . ")</p></div>";
        }
        ?>
        <nav>
            <div class="buttons-container">
                <a href="home_page.php" class="header-button">Home</a>
                <a href="product_page.php" class="header-button">Products</a>
                <?php
                if (isset($_SESSION['is_valid_admin'])) {
                    echo '<a href="add_product_form.php" class="header-button">Create</a>';
                    echo '<a href="shipping.php" class="header-button">Shipping</a>';
                    echo '<a href="logout.php" class="header-button">Logout</a>';
                } else {
                    echo '<a href="login_page.php" class="header-button">Login</a>';
                }
                ?>
            </div>
        </nav>
    </header>
</body>