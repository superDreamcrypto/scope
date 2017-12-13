<?php
include 'locationDAL.php';

if(isset($_GET['lat'])&& isset($_GET['lon']))
{
    $lat = $_GET['lat'];
    $lon = $_GET['lon'];
updateLocation($lat, $lon);

}

?>