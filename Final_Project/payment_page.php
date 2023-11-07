<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <link rel="stylesheet" type="text/css" href="styles\payment_page.css">
</head>
<body>
    <div id="wrapper">
        <div id="leftcolumn">
            <button class="cartButton" onclick="location.href='../shopping_cart.php'"><a class="cartButtonText">CART</a></button>
            <nav> 
                <ul>
                    <li><a href="..\index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="..\catalog.html">Catalog</a>
                        <div class="dropdown-content">
                            <a href = "..\audio\category_audio.html">Audio</a>
                            <a href = "..\computer\category_computer.html">Computer</a>
                            <a href = "..\techacc\category_techacc.html">Accessory</a>
                        </div>
                    </li>
                    <li><a href="..\contact_us.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    
        <div id="rightcolumn">
            <table border=1>
                <tr>
                    <td>Email:</td>
                </tr>
                <tr>
                    <td><input type="text" name="customerEmail" placeholder="Email"></td>
                </tr>
            </table>
            <table border=1>
                <tr>
                    <td colspan="2">Shipping Address:</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="customerCountry" placeholder="Country/Region"></td>
                </tr>
                <tr>
                    <td><input type="text" name="customerFirstName" placeholder="First name"></td>
                    <td><input type="text" name="customerLastName" placeholder="Last name"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="customerAddress" placeholder="Address"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="customerApartment" placeholder="Apartment, suite, etc. (optional)"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="customerPostalCode" placeholder="Postal code"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="customerPhone" placeholder="Phone"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type = "submit" name = "checkout"><strong>Check out Now!</strong></button></td>
                </tr>
            </table>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electronic Shop<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>