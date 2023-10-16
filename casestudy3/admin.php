<?php


$JavaCheck = filter_input(INPUT_POST,'javacheck',FILTER_VALIDATE_BOOL);
$CafeCheck = filter_input(INPUT_POST,'cafecheck',FILTER_VALIDATE_BOOL);
$IcedCheck = filter_input(INPUT_POST,'icedcheck',FILTER_VALIDATE_BOOL);

$JavaP = filter_input(INPUT_POST, 'JavaPrice', FILTER_VALIDATE_FLOAT);
$CafePS = filter_input(INPUT_POST, 'CafeSinglePrice', FILTER_VALIDATE_FLOAT);
$CafePD = filter_input(INPUT_POST, 'CafeDoublePrice', FILTER_VALIDATE_FLOAT);
$IcedPS = filter_input(INPUT_POST, 'IcedSinglePrice', FILTER_VALIDATE_FLOAT);
$IcedPD = filter_input(INPUT_POST, 'IcedDoublePrice', FILTER_VALIDATE_FLOAT);

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

    mysqli_stmt_bind_param($stmt, "i", $JavaP);

    mysqli_stmt_execute($stmt);

    // echo "Java saved";
}

if($CafeCheck){
    $sql = "UPDATE javajamprice SET CafePS = ?, CafePD = ?";

    $stmt = mysqli_stmt_init($conn);
    if(! mysqli_stmt_prepare($stmt,$sql)){
    die( mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ii", $CafePS, $CafePD,);

    mysqli_stmt_execute($stmt);

    // echo "<br>Cafe saved";
}
if($IcedCheck){
    $sql = "UPDATE javajamprice SET IcedPS = ?, IcedPD = ?";

    $stmt = mysqli_stmt_init($conn);
    if(! mysqli_stmt_prepare($stmt,$sql)){
    die( mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ii", $IcedPS, $IcedPD);

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
                        <li><a href="report.html">Sales</a></li>
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
                        <input type = "text" style="width: 50px;" id = "JavaPrice" name = "JavaPrice">
                </tr>
                <tr>
                    <td><input type="checkbox" class = "drinkCheck" name="cafecheck" ></td>
                    <td><strong>Cafe au Lait</strong></td>
                    <td>House blended coffe infused into a smooth, steamed milk.<br>
                        <strong>Current Price:</strong> Single $<?php echo $CafePSDB; ?> Double $<?php echo $CafePDDB; ?><br>
                        <label class= "label_1">Single:</label>
                        <label class= "label_2">$</label>
                        <input type = 'text' style="width: 50px;" id = "CafeSinglePrice" name = "CafeSinglePrice">
                        <label class= "label_1">Double:</label>
                        <label class= "label_2">$</label>
                        <input type = 'text' style="width: 50px;" id = "CafeDoublePrice" name = "CafeDoublePrice">
                </tr>
                <tr>
                    <td><input type="checkbox" class = "drinkCheck" name="icedcheck" ></td>
                    <td><strong>Iced Cappuccino</strong></td>
                    <td>Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>
                        <strong>Current Price:</strong>  Single $<?php echo $IcedPSDB; ?> Double $<?php echo $IcedPDDB; ?><br>
                        <label class= "label_1">Single:</label>
                        <label class= "label_2">$</label>
                        <input type = 'text' style="width: 50px;" id = "IcedSinglePrice" name = "IcedSinglePrice">
                        <label class= "label_1">Double:</label>
                        <label class= "label_2">$</label>
                        <input type = 'text' style="width: 50px;" id = "IcedDoublePrice"  name = "IcedDoublePrice">
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><button onclick="location.href='admin.php'">Update Price</button></td>
                </tr>
            </table>
            </form>
        </div>

        </div>
        <footer>
            <small><i>Copyright &copy; 2023 JavaJam Coffee House<br>
            <a href="mailto: daryl.qinbo@heng.jiang.com">daryl.qinbo@heng.jiang.com"</a></i><br>
            <a href="admin.html">Admin</a></small>
        </footer>
    </div>
</body>
</html>