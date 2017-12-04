<?php
include '../utils/groupDAL.php';
include '../utils/connection.php';

session_start();
$userID = $_SESSION['userID'];
$groupName = $_POST['groupName'];

addGroup($groupName);
$Message = '"'.$groupName.'"'.' has been created! ';
header('Location: ../pages/userHome.php?Message='.$Message)

?>