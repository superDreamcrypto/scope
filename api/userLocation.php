<?php
include '../utils/userDAL.php';

if(isset($_GET['username']))
{
    $username = $_GET['username'];
   
    $member = getUserByUsername($username);
   
    
    $latLonArray= array('lat' => floatval($member[12]), 'lng' => floatval($member[13]));
    $latLonJson = json_encode($latLonArray) ;
    echo $latLonJson;

    exit;
}
?>