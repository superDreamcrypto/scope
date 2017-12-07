<?php
include '../utils/deviceDAL.php';
include '../utils/connection.php';

session_start();
$userID = $_SESSION['userID'];
$devicePhone = $_POST['phone'];
$deviceName = $_POST['deviceName'];

$Message = addDevice($userID, $devicePhone, $deviceName);
// $Message = '"'.$deviceName.'"'.' has been added to your profile! ';
header('Location: ../pages/userHome.php?Message='.$Message)

?>