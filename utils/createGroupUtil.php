<?php
include '../utils/groupDAL.php';
include '../utils/groupUserDAL.php';
include '../utils/connection.php';

session_start();
$userID = $_SESSION['userID'];
$groupName = $_POST['groupName'];

 $Message = addGroup($groupName);
 $groupID = getGroupByName($groupName);
 addGroupUser($userID, $groupID);
// $Message = '"'.$groupName.'"'.' has been created! ';
echo $Message;
// header('Location: ../pages/userHome.php?Message='.$Message)

?>