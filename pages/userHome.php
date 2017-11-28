<?php
include '../utils/userDAL.php';



if(isset($_POST['fname']))
{
  $fName = $_POST['fname'];
  $lName = $_POST['lname'];
  $uName = $_POST['uName'];
  $password = $_POST['password'];
  $confPassword = $_POST['confirm'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  addUser($fName, $lName, $uName, $password, $phone, $email);
  echo $fName.'<br>'.$lName.'<br>'.$uName.'<br>'.$password.'<br>'.$phone.'<br>'.$email;
}
else
{
  echo 'isset = false <br>'. $_POST['fname'];
}
?>