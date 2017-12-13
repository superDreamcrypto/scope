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

editUser($id, $fName, $lName, $uName, $password, $role, $phone, $email, $imageName, $hair, $weight, $ethnicity, $last);

$Message = "User profile has been updated! ";
header('Location: ../pages/adminPanel.php?Message='.$Message)

?>