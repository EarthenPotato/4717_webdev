<?php
// Establish a database connection
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Connection error: ' . mysqli_connect_error());
}

// Process the form data
if (isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']); // Get the quantity from the form
    $default_product_name = isset($_POST['default_product']) ? $_POST['default_product'] : "Default Product Name";
    
    $sql = "UPDATE cart SET $product_name = $product_name + $quantity";
    if ($conn->query($sql) === TRUE) {
        echo "Record added to the database successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
