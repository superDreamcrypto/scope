<?php
require 'connection.php';

function addDevice($_Device_User_ID, $_Device_Phone_Num, $_Device_Name){
    
   $user_id = $_Device_User_ID;
   $phone =  $_Device_Phone_Num;
   $name = $_Device_Name;

    global $con;
    $sql = "INSERT INTO device (Device_ID, Device_User_ID, Device_Phone_Num, Device_Name )
            VALUES (null, '$user_id', '$phone', '$name' )";
    
    if ($con->query($sql) === TRUE) {
        $Message = '"'.$name.'"'.' has been added to your profile! ';
    } else {
        $Message = "Error: " . $sql . "<br>" . $con->error;
    }
    
    // mysqli_close($con);
    unset($con);
    return $Message ;

}




function deleteDevice(){
    global $con;
    $id = 1;
    // $id = $_GET['id'];
    // $query = mysqli_query($con,"SELECT * FROM user WHERE User_ID = '$id'");
    // $imageFile = mysqli_fetch_assoc($query);
    // unlink("img/main/" .$imageFile['name']);
    mysqli_query($con,"DELETE FROM device WHERE Device_ID = '$id'");
    // mysqli_close($con);
    unset($con);
    // header("location:suadminhome.php");
    echo "Your selection has been deleted";
}



function editDevice($_Device_id, $_Device_User_ID, $_Device_Phone_Num, $_Device_Name){

    $device_id = $_Device_id;
    $user_id = $_Device_User_ID;
    $phone =  $_Device_Phone_Num;
    $name = $_Device_Name;

    global $con;
    $sql = "UPDATE device 
            SET Device_ID = '$device_id', Device_User_ID = '$user_id', Device_Phone_Num = '$phone', Device_Name = '$name'
            WHERE Device_ID = '$device_id'";
    
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    
    // mysqli_close($con);
    unset($con);

}

function getDeviceByID($_id){
    $id = $_id; 
    global $con;
    $query = "SELECT * 
                FROM `device`
                WHERE `Device_ID` = $id";
    
    if ($result = mysqli_query($con, $query))
    {
        
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $deviceID = $row['Device_ID'];
    $deviceUserID = $row['Device_User_ID'];
    $phone = $row['Device_Phone_Num'];
    $name = $row['Device_Name'];
  

        $deviceArray = array(
            $deviceID,$deviceUserID,$phone,$name
        );
    return $deviceArray;
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }   
    // mysqli_close($con);     
    unset($con);                 
}
?>