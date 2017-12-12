<?php
include '../utils/userDAL.php';

if(isset($_GET['username']))
{
    $username = $_GET['username'];
   
    $member = getUserByUsername($username);
   

    $latLon = json_encode('{lat: '.$member[12].', lng: '.$member[13].'}');
    // $latLon = json_encode('{lat: 44.2727845, lng: -93.2923275}');
    echo $latLon;
    exit;
}
?>