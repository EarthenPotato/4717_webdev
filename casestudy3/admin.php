<?php

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

ini_set('display_errors', 0);

$JavaCheck = filter_input(INPUT_POST,'javacheck',FILTER_VALIDATE_BOOL);
$CafeCheck = filter_input(INPUT_POST,'cafecheck',FILTER_VALIDATE_BOOL);
$IcedCheck = filter_input(INPUT_POST,'icedcheck',FILTER_VALIDATE_BOOL);

$JavaP = $_POST['JavaPrice'] ?? 0;
$CafePS = $_POST['CafeSinglePrice'] ?? 0;
$CafePD = $_POST['CafeDoublePrice'] ?? 0;
$IcedPS = $_POST['IcedSinglePrice'] ?? 0;
$IcedPD = $_POST['IcedDoublePrice'] ?? 0;



$host = "localhost";
$dbname = "javajam";
$username = "javajam";
$password = "javajam";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno()){
    die('connection error:'. mysqli_connect_error());
}

if($JavaCheck){
    $sql = "UPDATE javajamprice SET JavaP = ?";

    $stmt = mysqli_stmt_init($conn);
    if(! mysqli_stmt_prepare($stmt,$sql)){
    die( mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "d", $JavaP);

    mysqli_stmt_execute($stmt);

    // echo "$JavaP";
}

if($CafeCheck){
    $sql = "UPDATE javajamprice SET CafePS = ?, CafePD = ?";

    $stmt = mysqli_stmt_init($conn);
    if(! mysqli_stmt_prepare($stmt,$sql)){
    die( mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "dd", $CafePS, $CafePD,);

    mysqli_stmt_execute($stmt);

    // echo "<br>Cafe saved";
}
if($IcedCheck){
    $sql = "UPDATE javajamprice SET IcedPS = ?, IcedPD = ?";

    $stmt = mysqli_stmt_init($conn);
    if(! mysqli_stmt_prepare($stmt,$sql)){
    die( mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "dd", $IcedPS, $IcedPD);

    mysqli_stmt_execute($stmt);

    // echo "<br>Iced saved";
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaJam Coffee House</title>
    <link rel="stylesheet" href="styles_admin.css">
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
        <h3>Click to update product prices:</h3>
        <div class="content">
            <form action="admin.php" method="post">
            <table>
                <tr>
                    <td><input type="checkbox" class = "drinkCheck" name="javacheck" ></td>
                    <td><strong>Just Java</strong></td>
                    <td>Regular house blend, decaffeinated coffee or flavour of the day.<br>
                        <strong>Current Price:</strong> Single $<?php echo $JavaPDB; ?><br>
                        <label class= "label_1">Single:</label>
                        <label class= "label_2">$</label>
                        <input type = "number" step = "0.01" style="width: 80px;" id = "JavaPrice" name = "JavaPrice" min = 0>
                </tr>
                <tr>
                    <td><input type="checkbox" class = "drinkCheck" name="cafecheck" ></td>
                    <td><strong>Cafe au Lait</strong></td>
                    <td>House blended coffe infused into a smooth, steamed milk.<br>
                        <strong>Current Price:</strong> Single $<?php echo $CafePSDB; ?> Double $<?php echo $CafePDDB; ?><br>
                        <label class= "label_1">Single:</label>
                        <label class= "label_2">$</label>
                        <input type = 'number' step = "0.01" style="width: 80px;" id = "CafeSinglePrice" name = "CafeSinglePrice" min = 0>
                        <label class= "label_1">Double:</label>
                        <label class= "label_2">$</label>
                        <input type = 'number' step = "0.01" style="width: 80px;" id = "CafeDoublePrice" name = "CafeDoublePrice" min = 0>
                </tr>
                <tr>
                    <td><input type="checkbox" class = "drinkCheck" name="icedcheck" ></td>
                    <td><strong>Iced Cappuccino</strong></td>
                    <td>Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>
                        <strong>Current Price:</strong>  Single $<?php echo $IcedPSDB; ?> Double $<?php echo $IcedPDDB; ?><br>
                        <label class= "label_1">Single:</label>
                        <label class= "label_2">$</label>
                        <input type = 'number' step = "0.01" style="width: 80px;" id = "IcedSinglePrice" name = "IcedSinglePrice" min = 0>
                        <label class= "label_1">Double:</label>
                        <label class= "label_2">$</label>
                        <input type = 'number' step = "0.01" style="width: 80px;" id = "IcedDoublePrice"  name = "IcedDoublePrice" min = 0>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><button type="submit" style="width: 100px; float: right;">Update Price</button></td>
                </tr>
            </table>
            </form>
        </div>

        </div>
        <footer>
            <small><i>Copyright &copy; 2023 JavaJam Coffee House<br>
            <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com</a></i><br></small>
        </footer>
    </div>
</body>
</html>