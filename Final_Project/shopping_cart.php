<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}

$sql = "SELECT product, quantity FROM your_table_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product = $row["product"];
        $quantity = $row["quantity"];
    }
} else {
    echo "No products found.";
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