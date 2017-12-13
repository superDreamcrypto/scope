<?php
require 'connection.php';

function addGroupUser($_User_ID, $_Group_ID){
    
   $userID = $_User_ID;
   $groupID =  $_Group_ID;

    global $con;
    $sql = "INSERT INTO groupuser (GroupUser_ID, GroupUser_User_ID, GroupUser_Group_ID )
            VALUES (null, '$userID', '$groupID' )";
    
    if ($con->query($sql) === TRUE) {
        // echo "New groupUser record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    
    mysqli_close($con);

}




function deleteGroupUser($_id){
    $id = $_id;
    global $con;
    
    mysqli_query($con,"DELETE FROM groupuser WHERE GroupUser_ID = '$id'");
    mysqli_close($con);
    // header("location:suadminhome.php");
    echo "Your selection has been deleted";
}




?>