<php?
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
</head>
<body>
    <div id="wrapper">
            <div id="leftcolumn">
                <button class="cartButton" onclick="location.href='shopping_cart.php'"><a class="cartButtonText">CART</a></button>
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
            <div class="content">
                <h3>Order Detail</h3>
                <h4>Order Number</h4>
                <h4>Order Date</h4>
                <table name ="order_summary">
                    <tr>
                        <td>Price</td>
                        <td>$ php calc</td>
                    </tr>
                    <tr>
                        <td>quantity</td>
                        <td>$ php calc</td>
                    </tr>
                    <tr>
                        <td>subtotal </td>
                        <td>$ php calc</td>
                    </tr>
                    <tr>
                        <td>total </td>
                        <td>$ php calc</td>
                    </tr>
                </table>
                <h4>Shipping Information</h4>
                <table name = "Shipping">
                    <tr>
                        <td>Name</td>
                        <td> buyer name</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> buyer address</td>
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