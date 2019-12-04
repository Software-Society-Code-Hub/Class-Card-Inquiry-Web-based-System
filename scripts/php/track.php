<?php
include 'config.php';


$getBarCode = $_GET['BarCode'];


$userData = mysqli_query($con,"SELECT * from classcardinquiry WHERE BarCode='$getBarCode'");

$response = array();

while($row = mysqli_fetch_assoc($userData)){

   $response[] = $row;
}

echo json_encode($response);

exit;
?>