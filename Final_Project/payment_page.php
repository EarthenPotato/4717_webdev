<?php 
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('conn error: ' . mysqli_connect_error());
}

if (isset($_POST['checkout'])) {
    // Retrieve form data and sanitize
    $cCountry = mysqli_real_escape_string($conn, $_POST['cCountry']);
    $cName = mysqli_real_escape_string($conn, $_POST['cName']);
    $cAddress = mysqli_real_escape_string($conn, $_POST['cAddress']);
    $cApartment = mysqli_real_escape_string($conn, $_POST['cApartment']);
    $cPostalCode = mysqli_real_escape_string($conn, $_POST['cPostalCode']);
    $cPhone = mysqli_real_escape_string($conn, $_POST['cPhone']);
    echo $cCountry;
    // Construct the SQL query
    $sql = "INSERT INTO customers (country, name, address, room, postal_code, phone_number) VALUES ('$cCountry', '$cName', '$cAddress', '$cApartment', '$cPostalCode', '$cPhone')";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully.";
        header('Location: ../order_sum.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="styles/payment_page.css">
    <script src="javascript/paymentFormCheck.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="leftcolumn">
            <button class="cartButton" onclick="location.href='../shopping_cart.php'"><a class="cartButtonText">CART</a></button>
            <nav> 
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="catalog.html">Catalog</a>
                        <div class="dropdown-content">
                            <a href = "audio\category_audio.html">Audio</a>
                            <a href = "computer\category_computer.html">Computer</a>
                            <a href = "techacc\category_techacc.html">Accessory</a>
                        </div>
                    </li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div id="rightcolumn">
            <h3>Checkout</h3>
        <form id="paymentForm" action="payment_page.php" method="post">
            <table class=adminTable>
                <tr>
                    <td>Contact:</td>
                </tr>
                <tr>
                    <td><input type="text" id="emailInput" name="cEmail" placeholder="Email: [yourname@company.com]" novalidate></td>
                </tr>
            </table>
            <table class=adminTable>
                <tr>
                    <td>Shipping Address:</td>
                </tr>
                <tr>
                    <td><input type="text" name="cCountry" placeholder="Country/Region: [Singapore]"></td>
                </tr>
                <tr>
                    <td><input type="text" name="cName" placeholder="Name: [John Doe]"></td>
                </tr>
                <tr>
                    <td><input type="text" name="cAddress" placeholder="Address: [123 Apple St.]"></td>
                </tr>
                <tr>
                    <td><input type="text" name="cApartment" placeholder="Apartment, suite, etc. (optional): [#04-05]"></td>
                </tr>
                <tr>
                    <td><input type="text" id="postalCodeInput" name="cPostalCode" placeholder="Postal code: [123456]" oninput="numericInput(event, 6)"></td>
                </tr>
                <tr>
                    <td><input type="text" id="phoneInput" name="cPhone" placeholder="Phone number: [12345678]" oninput="numericInput(event, 8)"></td>
                </tr>
                <tr>
                    <td><button type = "submit" name = "checkout"><strong>Check out Now!</strong></button></td>
                </tr>
            </table>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electroshock<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>