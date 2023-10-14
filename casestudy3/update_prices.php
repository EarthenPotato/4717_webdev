<?php
@$dbcnx = new mysqli('localhost','javajam','javajam','javajam');

if ($dbcnx->connect_error){
	echo "Database is not online"; 
	exit;
	}

if (!$dbcnx->select_db ("javajam"))
	exit("<p>Unable to locate the javajam database</p>");

    // create short variable names
    $JavaP = $_POST['JavaP'];
    $JavaAmt = $_POST['JavaAmt'];
    $CafePS = $_POST['CafePS'];
    $CafePSAmt = $_POST['CafePSAmt'];
    $CafePD = $_POST['CafePD'];
    $CafePDAmt = $_POST['CafePDAmt'];
    $IcedPS = $_POST['IcedPS'];
    $IcedPSAmt = $_POST['IcedPSAmt'];
    $IcedPD = $_POST['IcedPD'];
    $IcedPDAmt = $_POST['IcedPDAmt'];

    function updatePrice($dbcnx, $name, $price) {
        $query = "UPDATE prices SET price = $price WHERE name = '$name'";
        $result = $dbcnx->query($query);
        if (!$result) {
            echo "<p>Error updating price.</p>";
        }
    }

