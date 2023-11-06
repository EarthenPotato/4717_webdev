<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}

$itemName = mysqli_real_escape_string($conn, "CP1"); // Always escape variables used in SQL queries
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

if (isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']); 
    $product_name_input = $_POST['default_product']; 

    if ($product_name_input) {
        $product_name = mysqli_real_escape_string($conn, $product_name_input);
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE product_name = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("is", $quantity, $product_name);
        if ($stmt->execute()) {
            echo "Record updated in the database successfully.";
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo " - Product Name: " . $row["product_name"]. " - Quantity: " . $row["quantity"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } 
else {
        echo "Invalid product name.";
    }

$conn->close();

?>
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
                <h3>Powerhouse Desktop PC</h3>
                <h4><?php echo"Price: $" . $itemPrice   ;?></h4>
                <table>
                    <tr>
                        <td>
                            <input type = "number" style = "width: 150px;" min = 0 max = 999 step = 1 onchange = calculate_price()>
                            <button name = 'add_to_cart'>Add to cart</button><br>
                            <button name = "checkout"><strong>Check out Now!</strong></button>
                        </td>
                        <td rowspan="2"><img src="..\pictures\computer.jpg" width = "80%"></td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                            Unleash peak performance with our Powerhouse Desktop PC.
                            Equipped with the latest high-speed processors and cutting-edge graphics, it handles intense gaming sessions, content creation, and heavy multitasking with ease.
                            Its robust thermal design ensures optimal cooling, while its sleek chassis fits any modern workspace.
                            With expansive storage and upgradability options, this PC is not just a purchase; it's an investment in enduring excellence.
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