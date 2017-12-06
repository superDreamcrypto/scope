<?php
include '../utils/groupDAL.php';
include '../utils/connection.php';

$id = $_GET['id'];

deleteGroup($id);

$Message = "The selected group has been deleted! ";
header('Location: ../pages/adminPanel.php?Message='.$Message)
?>