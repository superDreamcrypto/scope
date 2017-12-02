<?php
include '../utils/userDAL.php';
include '../utils/connection.php';

session_start();
$id = $_SESSION['id'];
$fName = $_POST['profname'];
$lName = $_POST['lname'];
$uName = $_POST['uName'];
$_SESSION['uName'] = $uName;
$password = $_POST['password'];
$_SESSION['password'] = $password;
$role = $_SESSION['role'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$imageName = $_POST['file'];
$hair = $_POST['hair'];
$weight = $_POST['weight'];
$ethnicity = $_POST['ethnicity'];
$last = $_SESSION['lastLocation'];

editUser($id, $fName, $lName, $uName, $password, $role, $phone, $email, $imageName, $hair, $weight, $ethnicity, $last);

$Message = "Ypur profile has been updated! ";
header('Location: ../pages/userHome.php?Message='.$Message)

?>