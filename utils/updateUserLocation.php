<?php
include 'locationDAL.php';

if(isset($_GET['lat'])&& isset($_GET['lon']))
{
    $lat = $_GET['lat'];
    $lon = $_GET['lon'];
// echo $lat"<br>".$lon;
updateLocation($lat, $lon);

}

?>