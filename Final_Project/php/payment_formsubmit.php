<?php 
$host = "localhost";
$dbname = "electroshock";
$username = "electroshock";
$password = "electroshock";

$conn = mysqli_connect($host, $username, $password, $dbname);
echo "Connected to MySQL<br>";
if (mysqli_connect_errno()) {
    die('conn error: ' . mysqli_connect_error());
}

echo "Country: " . $cCountry . "<br>";
echo "Name: " . $cName . "<br>";
echo "Address: " . $cAddress . "<br>";
echo "Apartment: " . $cApartment . "<br>";
echo "Postal Code: " . $cPostalCode . "<br>";
echo "Phone: " . $cPhone . "<br>";
echo "Email: " . $cEmail . "<br>";

$sql = "INSERT INTO customers (country, name, address, room, postal_code, phone_number, email)
VALUES ('$cCountry', '$cName', '$cAddress', '$cApartment', '$cPostalCode', '$cPhone', '$cEmail')";

if (mysqli_query($conn, $sql)) {
echo "Data inserted successfully.";
header('Location: ../order_sum.php');
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>