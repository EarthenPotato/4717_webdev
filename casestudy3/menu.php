<?php
$host = "localhost";
$dbname = "javajam";
$username = "javajam";
$password = "javajam";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno()){
    die('connection error:'. mysqli_connect_error());
}


$sql = "SELECT JavaP FROM javajamprice LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $JavaPDB = $row['JavaP'];
}

$sql = "SELECT CafePS FROM javajamprice LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $CafePSDB = $row['CafePS'];
}

$sql = "SELECT CafePD FROM javajamprice LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $CafePDDB = $row['CafePD'];
}

$sql = "SELECT IcedPS FROM javajamprice LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $IcedPSDB = $row['IcedPS'];
}

$sql = "SELECT IcedPD FROM javajamprice LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $IcedPDDB = $row['IcedPD'];
}

// sql sumbmission of data 
if (isset($_POST['submit'])) {


    $JavaSaleA = $conn->real_escape_string($_POST['JavaSaleA']);

    if(isset($_POST['Cafe'])) {
        $selectedDrink = $_POST['Cafe'];
        if ($selectedDrink == "2"){
            $CafeSaleAS = $conn->real_escape_string($_POST['CafeSaleA']);
            $CafeSaleAD = 0;
        }
        if ($selectedDrink == "3"){
            $CafeSaleAS = 0;
            $CafeSaleAD = $conn->real_escape_string($_POST['CafeSaleA']);
        }
    }
    
    if(isset($_POST['Iced'])) {
        $selectedDrink = $_POST['Iced'];
        if ($selectedDrink == "4"){
            $IcedSaleAS = $conn->real_escape_string($_POST['IcedSaleA']);
            $IcedSaleAD = 0;
        }
        if ($selectedDrink == "5"){
            $IcedSaleAS = 0;
            $IcedSaleAD = $conn->real_escape_string($_POST['IcedSaleA']);
        }
    }

    $sql = "INSERT INTO javajamquant (JavaSaleP, JavaSaleA, CafeSalePS, CafeSaleAS, CafeSalePD, CafeSaleAD, IcedSalePS, IcedSaleAS, IcedSalePD, IcedSaleAD) 
        VALUES ('$JavaPDB', '$JavaSaleA', '$CafePSDB', '$CafeSaleAS', '$CafePDDB', '$CafeSaleAD', '$IcedPSDB', '$IcedSaleAS', '$IcedPDDB', '$IcedSaleAD')";


    if ($conn->query($sql) === TRUE) {
        // echo "Data uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaJam Coffee House - Menu</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="nochange.js"></script>
</head>
<body onload="radio_value('Java',<?php echo $JavaPDB?>), radio_value('Cafe',<?php echo $CafePSDB?>), radio_value('Iced',<?php echo $JavaPDB?>)">
    <div id="wrapper">
        <header>
            <h1><img src="header.jpg" width="500" height="100"></h1>
        </header>
            <div id="leftcolumn">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="music.html">Music</a></li>
                        <li><a href="jobs.html">Jobs</a></li>
                    </ul>
                </nav>
            </div>
        <div id="rightcolumn">
        <h3>Coffee at JavaJam</h3>
        <div class="content">
            <form action="menu.php" method="post">
            <table>
                <tr>
                    <td><strong>Just Java</strong></td>
                    <td>Regular house blend, decaffeinated coffee or flavour of the day.<br>
                        <strong><label class="inline-text"><input type = "radio"  name = "Java" value = "1"  onclick = "radio_value('Java',<?php echo $JavaPDB?>),computeCost()" checked class="inline-button"/> Single $<?php echo $JavaPDB; ?> </label> 
                        <td> <input type = "number"  id = "Java_num" name = "JavaSaleA" style="width: 100px;" oninput="update_sub_price('Java', <?php echo $JavaPDB?>, 0),computeCost()" min = "0"/> </td>
                        <td id = "Java_sub_cost">$0.00</td>
                </tr>
                <tr>
                    <td><strong>Cafe au Lait</strong></td>
                    <td>House blended coffe infused into a smooth, steamed milk.<br>
                        <strong><label class="inline-text"> <input type = "radio"  name = "Cafe" value = "2" onchange = "update_sub_price('Cafe', <?php echo $CafePSDB?>, <?php echo $CafePDDB?>),computeCost()" onclick = "radio_value('Cafe',<?php echo $CafePSDB?>)" checked  class="inline-button" /> Single $<?php echo $CafePSDB; ?> </label> 
                        <label class="inline-text"> <input type = "radio"  name = "Cafe" value = "3" onchange = "update_sub_price('Cafe', <?php echo $CafePSDB?>, <?php echo $CafePDDB?>),computeCost()" onclick = "radio_value('Cafe',<?php echo $CafePDDB?>)" class="inline-button"/> Double $<?php echo $CafePDDB; ?> </label> </strong>
                    <td> <input type = "number"  id = "Cafe_num" name = "CafeSaleA" style="width: 100px;" oninput="update_sub_price('Cafe', <?php echo $CafePSDB?>, <?php echo $CafePDDB?>),computeCost()" min = "0"/> </td>
                    <td id = "Cafe_sub_cost">$0.00</td>
                </tr>
                <tr>
                    <td><strong>Iced Cappuccino</strong></td>
                    <td>Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>
                        <strong><label class="inline-text"> <input type = "radio"  name = "Iced" value = "4" onchange = "update_sub_price('Iced', <?php echo $IcedPSDB?>, <?php echo $IcedPDDB?>),computeCost()" onclick = "radio_value('Iced',<?php echo $IcedPSDB?>" checked  class="inline-button"/> Single $<?php echo $IcedPSDB; ?>  </label> 
                        <label class="inline-text"> <input type = "radio"  name = "Iced" value = "5" onchange = "update_sub_price('Iced', <?php echo $IcedPSDB?>, <?php echo $IcedPDDB?>),computeCost()" onclick = "radio_value('Iced',<?php echo $IcedPDDB?>)" class="inline-button"/> Double $<?php echo $IcedPDDB; ?>  </label> </strong>
                    <td> <input type = "number"  id = "Iced_num" name = "IcedSaleA" style="width: 100px;" oninput="update_sub_price('Iced', <?php echo $IcedPSDB; ?>, <?php echo $IcedPDDB; ?>),computeCost()" min = "0"/> </td>
                    <td id = "Iced_sub_cost">$0.00</td>

                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style = "text-align: center;">
                        <!-- <strong>Total Price</strong> -->
                        <input type = "submit" name = "submit"value = "Total Cost"/>
                    </td>   
                    <td id = "Total_Price">
                        $0.00
                    </td>
                </tr>
                </table>
        </div>
        </div>
        <footer>
            <small><i>Copyright &copy; 2023 JavaJam Coffee House<br>
            <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i></small>
        </footer>
    </div>
</body>
</html>