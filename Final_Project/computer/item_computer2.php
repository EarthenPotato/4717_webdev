<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}

$itemName = mysqli_real_escape_string($conn, "CP2"); // Always escape variables used in SQL queries
$sql = "SELECT price FROM product WHERE item = '$itemName' LIMIT 1"; // Assuming 'product_name' is the column to match and 'price' is the column you want to select

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $itemPrice = $row['price']; // The 'price' should be the column name where the price is stored
} else {
    $itemPrice = "Item not found"; 
}


if (isset($_POST['add_to_cart'])) {
$quantity = (isset($_POST['quantity']) && intval($_POST['quantity']) > 0) ? intval($_POST['quantity']) : 1;
    $product_name_input = $_POST['default_product']; 

    if ($product_name_input) {
        $product_name = mysqli_real_escape_string($conn, $product_name_input);
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE product_name = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("is", $quantity, $product_name);
        if ($stmt->execute()) {
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } 

if (isset($_POST["checkout"])) {
    $quantity = (isset($_POST['quantity']) && intval($_POST['quantity']) > 0) ? intval($_POST['quantity']) : 1;
    $product_name_input = $_POST['default_product'];
    // echo $quantity;
    if ($product_name_input) {
        $product_name = mysqli_real_escape_string($conn, $product_name_input);
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE product_name = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("is", $quantity, $product_name);
        if ($stmt->execute()) {
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);
            header('Location: ../order_sum.php');
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compact All-in-One Computer</title>
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
                        <li><a href="..\contact_us.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        <div id="rightcolumn">
            <div class="content">
            <form action="item_computer2.php" method="post">
                <h3>Compact All-in-One Computer</h3>
                <h4><?php echo"Price: $" . $itemPrice   ;?></h4>
                <table>
                    <tr>
                        <td>
                            <input type = "number" style = "width: 150px;" min = 0 max = 999 step = 1 placeholder="1">
                            <button name = 'add_to_cart'>Add to cart</button><br>
                            <input type="hidden" name="default_product" value="CQ2">
                            <button name = "checkout"><strong>Check out Now!</strong></button>
                        </td>
                        <td rowspan="2"><img src="..\pictures\computer.jpg" width = "80%"></td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                            Maximize space without compromising power with our Compact All-in-One Computer.
                            This elegant machine boasts a vivid display and powerful internals to breeze through your daily tasks.
                            With its clutter-free design and built-in speakers, it offers a seamless setup for the home or office.
                            Enjoy a vivid display for all your work and entertainment needs, coupled with a responsive performance that's ready when you are.
                            </p>
                        </td>
                    </tr>
                </table>     
            </div>
        </div>
    </div>

    <footer>
        <small><i>Copyright &copy; 2023 Electroshock<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>
</html>