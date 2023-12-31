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

if (isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']); 
    $product_name_input = $_POST['default_product']; 

    // echo $product_name_input, $quantity;

    if ($product_name_input) {
        $product_name = mysqli_real_escape_string($conn, $product_name_input);
        // echo $product_name;
        // Prepare the SQL statement to prevent SQL injection
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE product_name = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("is", $quantity, $product_name);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Record updated in the database successfully.";
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo " - Product Name: " . $row["product_name"]. " - Quantity: " . $row["quantity"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

            // Close the prepared statement
        $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Invalid product name.";
    }

echo "SQL: " . $sql . "<br>";
echo "Quantity: " . $quantity . "<br>";
echo "Product Name: " . $product_name . "<br>";


$conn->close();
?>
