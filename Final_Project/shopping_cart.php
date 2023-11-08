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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $productToDelete = $_POST['product'];

    $sql = "UPDATE cart SET quantity = 0 WHERE product_name = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $productToDelete);

    if ($stmt->execute()) {
        header('Location: shopping_cart.php');
        // echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
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
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="styles/catalog.css">
    <script src="javascript/dynamictable.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="leftcolumn">
            <button class="cartButton"><a class="cartButtonText" href="shopping_cart.php">CART</a></button>
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
                <h3>Shopping Cart</h3>

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
                <button onclick="confirmOrder()">Confirm</button>
            </div>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electroshock<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>
</html>