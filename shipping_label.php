<!-- 
Giovani Bergamasco
4/5/2024
IT - 202 002
Phase 4 Assignment: PHP Authentication and Delete SQL Data
glb7@njit.edu  
-->
<?php
session_start();
if (!isset($_SESSION['is_valid_admin'])) {
    $login_message = "You must log in to access that page.";
    header("Location: login_page.php?login_message=".urlencode($login_message));
    exit();
}
?>

<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $error_message = '';
    $states = array("AL","AK","AZ","AR","CA","CO","CT","DE","DC","FL", "GA","HI","ID","IL","IN","IA","KS","KY","LA","ME", "MD","MA","MI","MN","MS","MO","MT","NE","NV","NH", "NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI", "SC","SD","TN","TX","UT","VT","VA","WA","WV","WI","WY");
    $state_names = array("Alabama","Alaska","Arizona","Arkansas","California", "Colorado","Connecticut","Delaware","District Of Columbia", "Florida","Georgia","Hawaii","Idaho","Illinois","Indiana", "Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland", "Massachusetts",">Michigan","Minnesota","Mississippi","Missouri", "Montana","Nebraska","Nevada","New Hampshire","New Jersey", "New Mexico","New York","North Carolina","North Dakota","Ohio", "Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina", "South Dakota","Tennessee","Texas","Utah","Vermont","Virginia", "Washington","West Virginia","Wisconsin","Wyoming");
    
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $toaddress = filter_input(INPUT_POST, 'toaddress', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
    $shipdate = filter_input(INPUT_POST, 'shipdate', FILTER_SANITIZE_STRING);
    $ordernumber = filter_input(INPUT_POST, 'ordernumber', FILTER_SANITIZE_NUMBER_INT);
    $dimensions = filter_input(INPUT_POST, 'dimensions', FILTER_SANITIZE_STRING);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $value = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if (!in_array($state, $states) && !in_array($state, $state_names)) {
        $error_message = "Please enter a valid U.S. state.";
    }

    if (!preg_match('/^\d{5}(-\d{4})?$/', $zipcode)) {
        $error_message = "Please enter a valid ZIP code.";
    }

    $dimensionsArray = explode('x', $dimensions); # Splits string by delimiter
    foreach ($dimensionsArray as $dimension) {
        if ($dimension > 36) {
            $error_message = "Each dimension must not be greater than 36 inches.";
            break;
        }
    }

    if ($value > 1000) {
        // Check if the value is less than 1000
        $error_message = "The total declared value of the package must not exceed $1,000.";
    }

    if (empty($toaddress)) {
        $error_message = "The address field must not be empty.";
    }

    if($error_message != '') {
        include('shipping.php');
        exit();
    }

    // TODO apply formatting
    $dimensions = $dimensions . ' inches';
    $weight = $weight . ' lbs';
    $value = '$' . number_format($value, 2);

   }else{
        header("Location: shipping.php");
   }

?>
<html>
    <head>
        <title>The Bibliophile's Commune Shipping</title>
        <link rel="icon" href="images/store_logo.png" type="image/png"/>
        <link rel="stylesheet" href="shipping_label.css"/>
    </head>
    <body>
        <?php include ('header.php');?>
        <main>
        <div id="shipping-label">Shipping Label</div>
        <div id="shipping-info">
            <p>US POSTAGE</p>
            <p><span><?php echo $shipdate; ?></span></p>
            <p>Order Number: <span><?php echo $ordernumber; ?></span></p>
            <p>Dimensions: <span><?php echo $dimensions; ?></span></p>
            <p>Weight: <span><?php echo $weight; ?></span></p>
            <p>Value: <span><?php echo $value; ?></span></p>
        </div>
        <div id="usps-mail"> USPS PRIORITY MAIL</div>
        <div id="shipping-info">
            <p>The Bibliophile's Commune</p>
            <p>Clifton Commons 395 Route 3 East</p>
            <p>Clifton, NJ 07014</p>
        </div>
        <div id="to-address">
            <p><span><?php echo $toaddress; ?></span></p>
            <p><span><?php echo $city . ', ' . $state . ' ' . $zipcode; ?></span></p>
        </div>
        <div id="tracking-number">
            <p>USPS TRACKING #</p>
            <img src="images/trackingnum.png" alt="trackingnum.png" width="350"/>
        </div>
        </main>   
    </body>
    <?php include ('footer.php');?>
</html>