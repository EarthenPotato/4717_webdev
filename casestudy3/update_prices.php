<?php


$JavaCheck = filter_input(INPUT_POST,'javacheck',FILTER_VALIDATE_BOOL);
$CafeCheck = filter_input(INPUT_POST,'cafecheck',FILTER_VALIDATE_BOOL);
$IcedCheck = filter_input(INPUT_POST,'icedcheck',FILTER_VALIDATE_BOOL);

$JavaP = filter_input(INPUT_POST, 'JavaPrice', FILTER_VALIDATE_FLOAT);
$CafePS = filter_input(INPUT_POST, 'CafeSinglePrice', FILTER_VALIDATE_FLOAT);
$CafePD = filter_input(INPUT_POST, 'CafeDoublePrice', FILTER_VALIDATE_FLOAT);
$IcedPS = filter_input(INPUT_POST, 'IcedSinglePrice', FILTER_VALIDATE_FLOAT);
$IcedPD = filter_input(INPUT_POST, 'IcedDoublePrice', FILTER_VALIDATE_FLOAT);


// var_dump($JavaCheck,$CafeCheck,$IcedCheck,$JavaP,$CafePS,$CafePD,$IcedPS,$IcedPD);

if($JavaCheck){

}
if($CafeCheck){
    
}
if($IcedCheck){
    
}

$host = "localhost";
$dbname = "javajam";
$username = "javajam";
$password = "javajam";

$conn = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno()){
    die('connection error:'. mysqli_connect_error());
}

$sql = "INSERT INTO message (JavaCheck,CafeCheck,IcedCheck,JavaP,CafePS,CafePD,IcedPS,IcedPD)
        VALUES (?,?,?,?,?,?,?,?)"

$stmt = mysqli_stmt_init($conn)
if(! mysqli_stmt_prepare($stmt,$sql)){
   die( mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssiiiiii", 
                        $JavaCheck, 
                        $CafeCheck, 
                        $IcedCheck, 
                        $JavaP, 
                        $CafePS, 
                        $CafePD, 
                        $IcedPS, 
                        $IcedPD);

mysqli_stmt_execute($stmt);

echo "record saved"
// for amt later
// $JavaAmt = filter_input(INPUT_POST, 'JavaAmt', FILTER_VALIDATE_INT);
// $CafePSAmt = filter_input(INPUT_POST, 'CafePSAmt', FILTER_VALIDATE_INT);
// $CafePDAmt = filter_input(INPUT_POST, 'CafePDAmt', FILTER_VALIDATE_INT);
// $IcedPSAmt = filter_input(INPUT_POST, 'IcedPSAmt', FILTER_VALIDATE_INT);
// $IcedPDAmt = filter_input(INPUT_POST, 'IcedPDAmt', FILTER_VALIDATE_INT);
