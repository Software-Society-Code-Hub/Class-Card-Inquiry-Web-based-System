<?php
if(isset($_POST['submit'])){
        $dbxml = $_FILES['StudentList'];
        $fileName = $_FILES['StudentList']['name'];
        $fileTmpName = $_FILES['StudentList']['tmp_name'];
        $fileSize = $_FILES['StudentList']['size'];
        $fileError = $_FILES['StudentList']['error'];
        $fileType = $_FILES['StudentList']['type'];
    
        $newName = "StudentList.xml";
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('xml');
        
        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 999999999) {
                    $fileDestination = 'scripts/php/db/'.$newName;
                    move_uploaded_file($fileTmpName, $fileDestination); 
                    
                } else {
                    echo "file too big";
                }
            } else {
                echo " error uploading file";
            }
        } else {
            echo "cannot upload file";
        }
    
    include 'config.php';

    $affectedRow = 0;

    $xml = simplexml_load_file("scripts/php/db/StudentList.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
        $ID = $row->ID;
        $BarCode = $row->BarCode;
        $Names = $row->Names;
        $YearandCourse = $row->YearandCourse;
        $Subject = $row->Subject;
        $Grade = $row->Grade;
        $ClassCard = $row->ClassCard;
        $SpecialKey = $row->SpecialKey;
    
        $sql = "INSERT INTO classcardinquiry(ID,BarCode,Names,YearandCourse,Subject,Grade,ClassCard,SpecialKey) VALUES ('" .$ID. "','" .$BarCode. "','" .$Names. "','" .$YearandCourse. "', '" .$Subject. "', '" .$Grade. "', '" .$ClassCard. "' ,'" .$SpecialKey."')";
    
        $result = mysqli_query($con, $sql);
    
        if (!empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($con) . "\n";
        }
    }

        if ($affectedRow > 0) {
            echo ' <p style="position:absolute; color:white; font-size:36px">   '.$affectedRow.' records were inserted</p>';
        } else {
            echo '<p style="position:absolute; color:white; font-size:36px">no records were inserted</p>';
        }
}
?>