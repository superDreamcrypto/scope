<?php
function updateLocation($_lat, $_lon ){
    $id = $_SESSION['userID'];
    $lat = $_lat
    $lon = $_lon;
    

    global $con;
    $sql = "UPDATE user 
            SET `Lat` = '$lat', `Lon` = $lon'
            WHERE `User_ID` = '$id'";
    
    if ($con->query($sql) === TRUE)
    {
    $Message = "Your location has been updated";
    }
}
?>