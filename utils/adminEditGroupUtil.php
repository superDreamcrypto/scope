<?php
include './groupDAL.php';
include './connection.php';


$id = $_GET['id'];
$name = $_POST['groupname'];

editGroup( $id, $name);

$Message = "The selected group has been updated! ";
header('Location: ../pages/adminPanel.php?Message='.$Message)

?>