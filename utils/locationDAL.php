<?php
include 'connection.php';
function updateLocation($_lat, $_lon ){
    session_start();
    $id = $_SESSION['userID'];
    $lat = $_lat;
    $lon = $_lon;
    echo $lat."<br>".$lon;

    global $con;
    $sql = "UPDATE user 
            SET `Lat` = '$lat',
             `Lon` = '$lon'
            WHERE `User_ID` = '$id'";
    
    if ($con->query($sql) === TRUE)
    {
    $Message = "Your location has been updated";
    }
    else
    {
        echo  "Error: " . $sql . "<br>" . $con->error;
    }
}
?>