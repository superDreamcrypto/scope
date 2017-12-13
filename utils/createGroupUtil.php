<?php
include '../utils/groupDAL.php';
include '../utils/userDAL.php';
include '../utils/groupUserDAL.php';
include '../utils/connection.php';

session_start();
$userID = $_SESSION['userID'];
// $username = $_SESSION['uName'];
// $password = $_SESSION['password'];
$groupName = $_POST['groupName'];

 $Message = addGroup($groupName);
 $groupID = getGroupByName($groupName);
 addGroupUser($userID, $groupID);
// $Message = '"'.$groupName.'"'.' has been created! ';
// session_destroy();
// addUserToSession($username,$password);
// echo $Message;
header('Location: ../pages/userHome.php?Message='.$Message)

?>