<?php
include './userDAL.php';
include './connection.php';


$id = $_GET['id'];
$fName = $_POST['profname'];
$lName = $_POST['lname']; 
$uName = $_POST['uName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$imageName = $_POST['imageName'];
$hair = $_POST['hair'];
$weight = $_POST['weight'];
$ethnicity = $_POST['ethnicity'];
$last = $_POST['last'];
// $userArray = getUserByID($id);
// $fName = $userArray[1];
// $lName = $userArray[2];
// $uName = $userArray[3];
// $phone = $userArray[4];
// $email = $userArray[5];
// $password = $userArray[6];
// $role = $userArray[7];
// $imageName = $userArray[8];
// $hair = $userArray[9];
// $weight = $userArray[10];
// $ethnicity = $userArray[11];
// $last = $userArray[12];

editUser($id, $fName, $lName, $uName, $password, $role, $phone, $email, $imageName, $hair, $weight, $ethnicity, $last);

$Message = "User profile has been updated! ";
header('Location: ../pages/adminPanel.php?Message='.$Message)

?>