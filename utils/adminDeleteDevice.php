<?php
include '../utils/deviceDAL.php';
include '../utils/connection.php';

$id = $_GET['id'];

deleteDevice($id);

$Message = "The selected device has been deleted! ";
header('Location: ../pages/adminPanel.php?Message='.$Message)
?>