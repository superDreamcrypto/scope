<?php
require 'connection.php';

function addGroup($_Group_Name) {
    
   $name = $_Group_Name;
    

    global $con;
    $sql = "INSERT INTO `group` (Group_ID, Group_Name)
            VALUES (null,'$name' )";
    // INSERT INTO `group` (`Group_ID`, `Group_Name`) VALUES (NULL, 'db test');
    
    if ($con->query($sql) === TRUE) {
        echo "New group record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    
    $con->close();

}




function deleteGroup(){
    global $con;
    $id = 3;
    // $id = $_GET['id'];
    // $query = mysqli_query($con,"SELECT * FROM user WHERE User_ID = '$id'");
    // $imageFile = mysqli_fetch_assoc($query);
    // unlink("img/main/" .$imageFile['name']);
    mysqli_query($con,"DELETE FROM  `group` WHERE Group_ID = '$id'");
    mysqli_close($con);
    // header("location:suadminhome.php");
    echo "Your selection has been deleted";
}



function editGroup($_Group_id,$_Group_Name){

    $id = $_Group_id;
    $name = $_Group_Name;

    global $con;
    $sql = "UPDATE  `group`
            SET Group_ID = '$id', Group_Name = '$name'
            WHERE Group_ID = '$id'";
    
    if ($con->query($sql) === TRUE) {
        echo "Record was updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    
    $con->close();

}

function getGroupByID($_id){
    $id = $_id; 
    global $con;
    $query = "SELECT * 
                FROM `group`
                WHERE `Group_ID` = $id";
    
    if ($result = mysqli_query($con, $query))
    {
        
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $groupID = $row['Group_ID'];
    $groupName = $row['Group_Name'];
  

        $groupArray = array(
            $groupID,$groupName
        );
    return $groupArray;
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }                         
}
?>