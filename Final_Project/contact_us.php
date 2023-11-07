<?php
// Define variables and initialize with empty values
$contact_name = $contact_email = $contact_message = "";

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $host = "localhost";
    $dbname = "electroshock";
    $username = "electroshock";
    $password = "electroshock";

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_us (contact_name, contact_email, contact_message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $contact_name, $contact_email, $contact_message);

    // Set parameters and execute
    $contact_name = trim($_POST['contact_name']);
    $contact_email = trim($_POST['contact_email']);
    $contact_message = trim($_POST['contact_message']);

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        echo "Record submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="styles/contact_us.css">
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
            <form id="contact_us" action="contact_us.php" method="post">
                <h3>Contact Us</h3>
                <p class="contactusMessage">
                    You can join our discord to submit a ticket if emailing isn't your thing.<br><br>
                    Please be adviced that our office hours are from Monday to Saturday.
                    We will respond to your inquiries during these days.
                    Thank you for your understanding.<br><br>
                    <strong>
                    Please refrain from sending duplicate inquiries through email and discord
                    for faster resolution of your issue.
                    </strong>
                <h4>Drop us a line</h4>
                <<form id="contact_us" action="contact_us.php" method="post">
                    <h3>Contact Us</h3>
                    <h4>Drop us a line</h4>
                    <div class="textboxGroup">
                        <div>
                            <input type="text" name="contact_name" placeholder="Name" required>
                            <input type="email" name="contact_email" placeholder="Email" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address.">
                        </div>
                        <div>
                            <textarea name="contact_message" placeholder="Message" required></textarea>
                        </div>
                        <div>
                            <button type="submit" name="submit">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <footer>
        <small><i>Copyright &copy; 2023 Electronic Shop<br>
        <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
    </footer>
</body>
</html>