<?php
include 'config.php';

$condition = "1";
if(isset($_GET['BC'])){
   $condition = " BarCode=".$_GET['BC'];
}
$userData = mysqli_query($con,"SELECT * from classcardinquiry WHERE ".$condition);

$response = array();

while($row = mysqli_fetch_assoc($userData)){

   $response[] = $row;
}

echo json_encode($response);

exit;
?>
