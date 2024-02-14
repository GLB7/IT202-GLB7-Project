<html>
    <head>
        <title>The Bibliophile's Commune Shipping</title>
        <link rel="icon" href="images/store_logo.png" type="image/png"/>
        <link rel="stylesheet" href="shipping.css"/>
    </head>
    <body>
        <?php include ('header.php');?>
        <main>
        <?php if (!empty($error_message)) { ?><p style="color: red; margin:0 25%; padding: 10px;"><?php echo htmlspecialchars($error_message);?></p><?php } ?>
        <!-- anything on this form can be changed with inspect source so validate with php -->
        <form action="shipping_label.php" method="post" id="packageform">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" placeholder="e.g., John" required><br>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="e.g., Doe" required><br>

            <label for="toaddress">Street Address:</label>
            <input type="text" id="toaddress" name="toaddress" placeholder="e.g., 123 Main Street" required><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" placeholder="e.g., Newark" required><br>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" placeholder="e.g., New Jersey or NJ" required><br>

            <label for="zipcode">ZIP Code:</label>
            <input type="number" id="zipcode" name="zipcode" placeholder="e.g., 07105 or 07105-1234" required><br>

            <label for="shipdate">Ship Date:</label>
            <input type="date" id="shipdate" name="shipdate" required><br>

            <label for="ordernumber">Order Number:</label>
            <input type="number" id="ordernumber" name="ordernumber" placeholder="e.g., 5" required><br>

            <label for="dimensions">Dimensions in inches (Length x Width x Height):</label>
            <input type="text" id="dimensions" name="dimensions" placeholder="e.g., 10x5x7" required><br>

            <label for="weight">Weight in pounds:</label>
            <input type="number" id="dimensions" name="weight" placeholder="e.g., 50" required><br>

            <label for="value">Total Declared Value:</label>
            <input type="number" id="value" name="value" min="0" step="0.01" placeholder="e.g., 55.25" required><br>

            <button type="submit">Get Shipping Label</button><br>
        </form>
        </main>   
    </body>
    <?php include ('footer.php');?>
</html>