<?php
include './deviceDAL.php';
include './connection.php';


$id = $_GET['id'];
$deviceUserID = $_POST['userdeviceid'];
$phone = $_POST['phone']; 
$name = $_POST['name'];


editDevice($id, $deviceUserID, $phone, $name);

$Message = "The selected device has been updated! ";
header('Location: ../pages/adminPanel.php?Message='.$Message)

?>