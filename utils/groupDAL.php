<?php
require 'connection.php';

function addGroup($_Group_Name) {
    
    $name = $_Group_Name;
    global $con;

    $sql = "SELECT *
                FROM `group` 
                WHERE `Group_Name` = '$name'";

if ($result = mysqli_query($con, $sql))
{
    if( mysqli_num_rows($result) != 0)
    // ^still needs work p- if == 0 it throws a warning an create a new group
    {
        $Message = 'You have been added to the "'.$name.'" group!';
        return $Message ;
            
    }
    else
    {
        $sql2 = "INSERT INTO `group` (Group_ID, Group_Name)
        VALUES (null,'$name' )";

        if ($con->query($sql2) === TRUE) 
        {
        $Message = 'The "'.$name.'" group'.' has been created! ';    
        return $Message ;
        }
        else
        {

        $Message =  "1 Error: " . $sql . "<br>" . $con->error;
        return $Message ;
        }
        
    }
}
else
{
    $Message =  "2 Error: " . $sql . "<br>" . $con->error;
    return $Message ;
}

   
        
    
    // mysqli_close($con);
    unset($con);
    return $Message ;
}




function deleteGroup(){
    global $con;
    $id = 3;
    // $id = $_GET['id'];
    // $query = mysqli_query($con,"SELECT * FROM user WHERE User_ID = '$id'");
    // $imageFile = mysqli_fetch_assoc($query);
    // unlink("img/main/" .$imageFile['name']);
    mysqli_query($con,"DELETE FROM  `group` WHERE Group_ID = '$id'");
    // mysqli_close($con);
    unset($con);
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
    
    // mysqli_close($con);
    unset($con);

}

function getGroupByID($_id){
    $id = $_id; 
    global $con;
    $query = "SELECT Group_Name 
                FROM `group`
                WHERE `Group_ID` = $id";
    
    if ($result = mysqli_query($con, $query))
    {
        
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $groupName = $row['Group_Name'];
  
       
    return $groupName;
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }     
    // mysqli_close($con); 
    unset($con);                   
}

function getGroupByName($_name){
    $name = $_name; 
    global $con;
    $query = "SELECT Group_ID 
                FROM `group`
                WHERE Group_Name = '$name'";
    
    if ($result = mysqli_query($con, $query))
    {
        
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $groupID = $row['Group_ID'];

    return $groupID;
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }  
    // mysqli_close($con);    
    unset($con);                   
}
?>