<?php

$host = "localhost";
$dbname = "javajam";
$username = "javajam";
$password = "javajam";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno()){
die('connection error:'. mysqli_connect_error());
}

//Total Sales
//Java Total Sales
$sql = "SELECT (SUM(JavaSaleP * JavaSaleA)) AS JavaTotalSale
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$JavaTS = $row['JavaTotalSale'];

//Cafe Total Sales
// $sql = "SELECT (SUM(CafeSalePS * CafeSaleAS) + SUM(CafeSalePD * CafeSaleAD)) AS CafeTotalSale
//         FROM javajamquant";
// $CafeTTS = $conn->query($sql);
$sql = "SELECT (SUM(CafeSalePS * CafeSaleAS)) AS CafeSTotalSale
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$CafeSTS = $row['CafeSTotalSale'];

$sql = "SELECT (SUM(CafeSalePD * CafeSaleAD)) AS CafeDTotalSale
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$CafeDTS = $row['CafeDTotalSale'];

// Iced Total Sales
$sql = "SELECT (SUM(IcedSalePS * IcedSaleAS) + SUM(IcedSalePD * IcedSaleAD)) AS IcedTotalSale
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$IcedTTS = $row['IcedTotalSale'];

$sql = "SELECT (SUM(IcedSalePS * IcedSaleAS)) AS IcedSTotalSale
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$IcedSTS = $row['IcedSTotalSale'];

$sql = "SELECT (SUM(IcedSalePD * IcedSaleAD)) AS IcedDTotalResult
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$IcedDTS = $row['IcedDTotalResult'];

//Total Quantity
//Java Total Quantity
$sql = "SELECT SUM(JavaSaleA) AS JavaTotalResult
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$JavaTQ = $row['JavaTotalResult'];

//Cafe Total Quantity
$sql = "SELECT SUM(CafeSaleAS) AS CafeSingleTotalResult
        FROM javajamquant";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$CafeSTQ = $row['CafeSingleTotalResult'];

$sql = "SELECT SUM(CafeSaleAD) AS CafeDoubleTotalResult
        FROM javajamquant";  // Updated query to use SUM
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$CafeDTQ = $row['CafeDoubleTotalResult'];

//Iced Total Quantity
$sql = "SELECT SUM(IcedSaleAS) AS IcedSingleTotalResult
        FROM javajamquant";  // Updated query to use SUM
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$IcedSTQ = $row['IcedSingleTotalResult'];

$sql = "SELECT SUM(IcedSaleAD) AS IcedDoubleTotalResult
        FROM javajamquant";  // Updated query to use SUM
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$IcedDTQ = $row['IcedDoubleTotalResult'];

$CafeTTS = $CafeSTS + $CafeDTS;

$IcedTTS = $IcedSTS + $IcedDTS;

$CafeTTQ = $CafeSTQ + $CafeDTQ;

$IcedTTQ = $IcedSTQ + $IcedDTQ;

$SingleAmt = $CafeSTQ+$IcedSTQ;

$DoubleAmt = $CafeDTQ+$IcedDTQ;

$SingleSale = $CafeSTS+$IcedSTS;

$DoubleSale = $CafeDTS+$IcedDTS;

if ($JavaTS > $CafeTTS && $JavaTS > $IcedTTS) {
    $popular = "Just Java";
} elseif ($CafeTTS > $JavaTS && $CafeTTS > $IcedTTS) {
    if ($CafeSTQ > $CafeDTQ) {
        $popular = "Single of Café au Lait";
    } else {
        $popular = "Double of Café au Lait";
    }
} else {
    if ($IcedSTQ > $IcedDTQ) {
        $popular = "Single of Iced Cappuccino";
    } else {
        $popular = "Double of Iced Cappuccino";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaJam Coffee House</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1><img src="header.jpg" width="500" height="100"></h1>
        </header>
            <div id="leftcolumn">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="admin.php">Updates</a></li>
                        <li><a href="report.php">Sales</a></li>
                    </ul>
                </nav>
            </div>
        <div id="rightcolumn">
        <div class="content">
            <h3>Category Sales Report</h3>
            <table>
                <tr>
                    <th>Category</th>
                    <th>Total Dollar Sales</th>
                    <th>Quantity Sales</th>
                </tr>
                <tr>
                    <td>Null</td>
                    <td>$<?php echo $JavaTS?></td>
                    <td><?php echo $JavaTQ?></td>
                </tr>
                <tr>
                    <td>Single</td>
                    <td>$<?php echo $SingleSale ?></td>
                    <td><?php echo $SingleAmt ?></td>
                </tr>
                <tr>
                    <td>Double</td>
                    <td>$<?php echo $DoubleSale ?></td>
                    <td><?php echo $DoubleAmt ?></td>
                </tr>
            </table>
            <p>
            Café au Lait - <?php echo ($CafeSTQ)?> Single ($<?php echo ($CafeSTS)?>), <?php echo ($CafeDTQ)?> Double ($<?php echo ($CafeDTS)?>)<br>
            Iced Cappuccino - <?php echo ($IcedSTQ) ?> Single ($<?php echo ($IcedSTS)?>), <?php echo ($IcedDTQ) ?> Double ($<?php echo ($IcedDTS)?>)
            </p>
            <P>
            Popular option of best selling product: <?php echo $popular ?>
            </P>
        </div>
        </div>
        <footer>
            <small><i>Copyright &copy; 2023 JavaJam Coffee House<br>
            <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br>
            <a href="admin.html">Admin</a></small>
        </footer>
    </div>
</body>
</html>