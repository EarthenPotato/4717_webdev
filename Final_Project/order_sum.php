<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}

$sql = "SELECT c.product_name, c.quantity, p.price
        FROM cart c
        LEFT JOIN product p ON SUBSTRING(c.product_name, 1, 1) = SUBSTRING(p.item, 1, 1)
                              AND SUBSTRING(c.product_name, 3, 1) = SUBSTRING(p.item, 3, 1)";


$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'product' => $row["product_name"],
            'quantity' => $row["quantity"],
            'price' => $row["price"]
        ];
    }
} else {
    echo "No products found.";
}

$sql = "SELECT name, address, postal, phone_number, email FROM customers ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($shipping_info = $result->fetch_assoc()){
    $name = $shipping_info['name'];
    $address = $shipping_info['address'];
    $postal = $shipping_info['postal'];
    $phone_number = $shipping_info['phone_number'];
    $email = $shipping_info['email'];
    }
}

if (isset($_POST['confirm'])) {

    $sql = 'SELECT item, price FROM product';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $item = $row['item'];
            $price = $row['price'];
            $itemsArray = explode(' ', $item);
            foreach ($itemsArray as $item) {
                $insertSql = "UPDATE order_list_price SET $item = $price";
                if ($conn->query($insertSql) === TRUE) {
                    echo "Price for '$item' copied successfully.<br>";
                } else {
                    echo "Error copying price for '$item': " . $conn->error . "<br>";
                }
            }
        }
    } else {
        echo "No products found.";
    }

    $sql = 'SELECT product_name, quantity FROM cart';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_name = $row['product_name'];
            $quantity = $row['quantity'];
            $product_nameArray = explode(' ', $product_name);
            foreach ($product_nameArray as $product_name) {
                $insertSql = "UPDATE order_list_quantity SET $product_name = $quantity";
                if ($conn->query($insertSql) === TRUE) {
                    echo "Price for '$product_name' copied successfully.<br>";
                } else {
                    echo "Error copying price for '$product_name': " . $conn->error . "<br>";
                }
            }
        }
    } else {
        echo "No products found.";
    }

    $conn->close();
}


?>

<script>
    var phpData = <?php echo json_encode($products); ?>;
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronic shop</title>
    <link rel="stylesheet" type="text/css" href="styles/catalog.css">
    <script src="javascript/dynamictable_order_sum.js"></script>
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
                <table id="orderTable" >
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <h4>Shipping Information</h4>
                    <table name="Shipping">
                        <tr>
                            <td>Name</td>
                            <td><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $address; ?></td>
                        </tr>
                        <tr>
                            <td>Postal Code</td>
                            <td><?php echo $postal; ?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><?php echo $phone_number; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $email; ?></td>
                        </tr>
                    </table>
                    <button name = 'confirm'>Confirm</button>
            </div>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electronic Shop<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>
</html>