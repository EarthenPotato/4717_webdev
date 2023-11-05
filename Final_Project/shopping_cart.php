<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronic shop</title>
    <link rel="stylesheet" type="text/css" href="styles/catalog.css">
    <script src="javascript/dynamictable.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="leftcolumn">
            <button class="cartButton"><a class="cartButtonText" href="shopping_cart.html">CART</a></button>
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
                    <li><a href="contact_us.html">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div id="rightcolumn">
            <div class="content">
                <h3>Shopping Cart</h3>

                <!-- <table border=1>
                    <tr>
                      <td><img src="pictures\headphone.jpg" width = "40%"></td>
                      <td>[productName<br>price placeholder]</td>
                      <td>[productCount placeholder]</td>
                    </tr>
                    <tr>
                      <td colspan="3"><textarea class="textareaOverride" placeholder="Special instruction"></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="2">[totalCost placeholder]</td>
                      <td style="text-align: right;"><button name = "checkout" style="width: 150px;"><strong>Check out Now!</strong></button></td>
                    </tr>
                  </table> -->




                <!-- <table>
                    <tr>
                        <td>image</td>
                        <td>
                            Price <br>
                            $php price 
                        </td>
                        <td>quantity</td>
                    </tr>
                    <tr>
                        <td>
                            <h3>special instructions</h3>
                            <input type="text" name="special_order" id="special_order">
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            Total: php calc 
                            <button><a href="payment_page.html">Order Now</a></button>
                        </td>
                    </tr>
                </table> -->
                <table id="orderTable" >
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    
                </table>
                  
            </div>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electronic Shop<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>
</html>