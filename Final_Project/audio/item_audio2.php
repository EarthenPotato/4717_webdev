<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno()){
    die('connection error:'. mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronic shop</title>
    <link rel="stylesheet" type="text/css" href="..\styles\catalog.css">
</head>
<body>
    <div id="wrapper">
            <div id="leftcolumn">
                <button class="cartButton" onclick="location.href='../shopping_cart.html'"><a class="cartButtonText">CART</a></button>
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
                        <li><a href="..\contact_us.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        <div id="rightcolumn">
            <div class="content">
                <h1>Audio Product 1</h1>
                <h2>Price php value</h2>
                <table>
                    <tr>
                        <td>
                            <input type = "number" min = 0 onchange = calculate_price()>
                            <button name = 'add_to_cart'>Add to cart</button>
                        </td>
                        <td><img src="..\pictures\forest_path.jpg" width = "70%"></td>
                    </tr>
                    <tr>
                        <td><button name = "checkout">Check out Now!</button></td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                Product Description
                            </p>
                        </td>
                    </tr>
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