<?php
include 'config.php';


$getBarCode = $_GET['BarCode'];
$getspecialKey = $_GET['specialKey'];


$userData = mysqli_query($con,"SELECT * from classcardinquiry WHERE BarCode='$getBarCode' AND SpecialKey='$getspecialKey'");

$response = array();

while($row = mysqli_fetch_assoc($userData)){

   $response[] = $row;
}

echo json_encode($response);

exit;
?>