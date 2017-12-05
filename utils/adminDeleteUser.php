<?php
include '../utils/userDAL.php';
include '../utils/connection.php';

$id = $_GET['id'];

deleteUser($id);

$Message = "Users profile has been deleted! ";
header('Location: ../pages/adminPanel.php?Message='.$Message)
?>