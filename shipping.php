<html>
    <head>
        <title>The Bibliophile's Commune Shipping</title>
        <link rel="icon" href="store_logo.png" type="image/png"/>
        <link rel="stylesheet" href="shipping.css"/>
    </head>
    <body>
        <?php include ('header.php');?>
        <main>
        <form action="#" method="post" id="packageForm">
            <label for="toAddresses">First & Last Name:</label>
            <input type="text" id="toAddresses" name="var" required>
            <br>

            <label for="toAddresses">Street Address:</label>
            <input type="text" id="toAddresses" name="var" required>
            <br>

            <label for="toAddresses">City:</label>
            <input type="text" id="toAddresses" name="var" required>
            <br>

            <label for="toAddresses">State:</label>
            <input type="text" id="toAddresses" name="var" required>
            <br>

            <label for="toAddresses">Zip Code:</label>
            <input type="text" id="toAddresses" name="var" required>
            <br>

            <label for="shipDate">Ship Date:</label>
            <input type="date" id="shipDate" name="shipDate" required>
            <br>

            <label for="orderNumber">Order Number:</label>
            <input type="text" id="orderNumber" name="orderNumber" required>
            <br>

            <label for="dimensions">Dimensions (Length x Width x Height):</label>
            <input type="text" id="dimensions" name="dimensions" placeholder="e.g., 10x5x8" required>
            <br>

            <label for="declaredValue">Total Declared Value:</label>
            <input type="text" id="declaredValue" name="declaredValue" placeholder="e.g., $100" required>
            <br>

            <button type="submit">Submit</button>
            <br>
        </form>
        </main>   
    </body>
    <?php include ('footer.php');?>
</html>