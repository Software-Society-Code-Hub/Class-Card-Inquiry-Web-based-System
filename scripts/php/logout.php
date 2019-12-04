<?php
session_start();
session_unset();
session_destroy();
header('location:../../../Class-Card-Inquiry-LCC-Website-migration/admin.php');
?>