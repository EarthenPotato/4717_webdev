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

$default_product_names = ['AP1', 'AP2', 'AP3', 'CQ1', 'CQ2', 'CQ3', 'TP1', 'TP2', 'TP3'];

// Process the form data
// if (isset($_POST['add_to_cart'])) {
//     $quantity = intval($_POST['quantity']); // Get the quantity from the form
//     $product_name = $_POST['product_name']; // Get the product name from the form    
//     $sql = "UPDATE cart SET quantity = quantity + $quantity WHERE product_name = '$default_product_names[$product_name]'";

//     if ($conn->query($sql) === TRUE) {
//         echo "Record added to the database successfully.";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

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

        if ($stmt) {
            $stmt->bind_param("is", $quantity, $product_name);
            
            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated in the database successfully.";
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
}

echo "SQL: " . $sql . "<br>";
echo "Quantity: " . $quantity . "<br>";
echo "Product Name: " . $product_name . "<br>";


$conn->close();
?>
