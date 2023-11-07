<?php
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}

// SQL to join the two tables on the ID column and select the necessary columns
$sql = "SELECT ol.ID, ol.customername, ql.AQ1, ql.AQ2, ql.AQ3, ql.CQ1, ql.CQ2, ql.CQ3, ql.TQ1, ql.TQ2, ql.TQ3 
        FROM order_list AS ol 
        INNER JOIN order_list_quantity AS ql 
        ON ol.ID = ql.ID";

// Execute the query
$result = $conn->query($sql);

// Initialize an empty array to store orders
$orders = array();

// Fetch the rows from the result set
if ($result && $result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Concatenate the quantities into a single string
        $quantities =  array_slice($row, 2); 
        // Append the data to the orders array
        $orders[] = [
            'ID' => $row['ID'],
            'customername' => $row['customername'],
            'quantities' => $quantities
        ];

    }
} else {
    echo "0 results";
}
// foreach ($orders as $order)
// {
//     echo implode(", ", $order["quantities"]);
//     echo "<br>";
// }


// Close the connection
$conn->close();


?>




<script>
    var phpData = <?php echo json_encode($orders); ?>;
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electronic shop</title>
    <link rel="stylesheet" type="text/css" href="styles/admin.css">
    <script src="javascript/dynamictable_admin.js"></script>
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
            <table id="orderTable">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Operation</th> <!-- Add this line -->
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