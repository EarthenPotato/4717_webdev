<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}

$itemName = mysqli_real_escape_string($conn, "AP2"); // Always escape variables used in SQL queries
$sql = "SELECT price FROM product WHERE item = '$itemName' LIMIT 1"; // Assuming 'product_name' is the column to match and 'price' is the column you want to select

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $itemPrice = $row['price']; // The 'price' should be the column name where the price is stored
} else {
    $itemPrice = "Item not found"; 
}

function calculate_price($product_quant, $price) {
    return $price * $product_quant;
}

$product_quant = isset($_POST['product_quant']) ? (int)$_POST['product_quant'] : 0;

if ($itemPrice !== "Item not found") {
    $price = calculate_price($product_quant, $itemPrice);
    echo "The price is: " . $price;
} else {
    echo $itemPrice;
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
                        <li><a href="..\contact_us.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        <div id="rightcolumn">
            <div class="content">
                <h3>Ultra-Comfort Wireless Headphones</h3>
                <h4><?php echo"Price: $" . $itemPrice   ;?></h4>
                <table>
                    <tr>
                        <td>
                            <input type = "number" style = "width: 150px;" min = 0 max = 999 step = 1 onchange = calculate_price()>
                            <button name = 'add_to_cart'>Add to cart</button><br>
                            <button name = "checkout"><strong>Check out Now!</strong></button>
                        </td>
                        <td rowspan="2"><img src="..\pictures\headphone.jpg" width = "80%"></td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                            Step into sonic brilliance with our Ultra-Comfort Wireless Headphones.
                            Tailored for the music enthusiast, they offer a rich, balanced soundstage and robust bass.
                            Experience the freedom of wireless connectivity coupled with a long-lasting battery, ensuring you stay unplugged for hours.
                            The lightweight, ergonomic design and breathable ear cushions mean they sit softly on your ears, making them ideal for prolonged listening.
                            Whether you're working out or winding down, these headphones are the ultimate audio accessory for everyday life.
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