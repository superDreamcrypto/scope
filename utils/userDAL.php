<?php
require 'connection.php';

function addUser($_fName, $_lName, $_uName, $_password, $_phone, $_email ){
    
    $fName = $_fName;
    $lName = $_lName;
    $uName = $_uName;
    $password = $_password;
    $phone = $_phone;
    $email = $_email;

    global $con;
    $sql = "INSERT INTO user (User_ID, First_Name, Last_Name, User_Phone_Num, Email, Username, Password, Image_Name, Hair_Color, Weight, Ethnicity, Last_Location)
    VALUES (null, '$fName', '$lName',  '$phone', '$email','$uName', '$password', null, null, null, null, null)";
    
    if ($con->query($sql) === TRUE) {
        echo "New user record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    
    $con->close();

}




function deleteUser(){
    global $con;
    $id = 3;
    // $id = $_GET['id'];
    // $query = mysqli_query($con,"SELECT * FROM user WHERE User_ID = '$id'");
    // $imageFile = mysqli_fetch_assoc($query);
    // unlink("img/main/" .$imageFile['name']);
    mysqli_query($con,"DELETE FROM user WHERE User_ID = '$id'");
    mysqli_close($con);
    // header("location:suadminhome.php");
    echo "Your selection has been deleted";
}



function editUser($_id, $_fName, $_lName, $_uName, $_password, $_phone, $_email, $_image, $_hair, $_weight, $_ethnicity, $_last ){
    $id = $_id;
    $fName = $_fName;
    $lName = $_lName;
    $uName = $_uName;
    $password = $_password;
    $phone = $_phone;
    $email = $_email;
    $image = $_image;
    $hair = $_hair;
    $weight = $_weight;
    $ethnicity = $_ethnicity;
    $last = $_last;
    
    global $con;
    $sql = "UPDATE user 
            SET User_ID = '$id', First_Name = '$fName', Last_Name = '$lName', User_Phone_Num = '$phone', Email = '$email', Username = '$uName', `Password` = '$password', Image_Name = '$image', Hair_Color = '$hair', `Weight` = '$weight', Ethnicity = '$ethnicity', Last_Location = '$last'
            WHERE User_ID = '$id'";
    
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();

}

function addRole1($_userID, $_password){
    $userID = $_userID;
    $password =  $_password;
    $role =  'Member';

    global $con;
    $sql = "INSERT INTO `role` (`Role_ID`, `Role_User_ID`, `Password`, `Role`)
                VALUES (null, '$userID', '$password', '$role')";
    
    if ($con->query($sql) === TRUE) {
        echo "New role record created successfully <br>";
    } else {
        echo "addRole() Error: " . $sql . "<br>" . $con->error;
    }
    
    $con->close();
}
function addRole($_userID, $_password){
    
    $userID = $_userID;
    $password = $_password;
    $role = 'Member';
 

    global $con;
    $sql = "INSERT INTO `role` (`Role_ID`, `Role_User_ID`, `Password`, `Role`)
    VALUES (null, `$userID`, `$password`, `$role`)";
    
    if ($con->query($sql) === TRUE) {
        echo "New role record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    
    $con->close();

}
// $userID = 3;
// function getUserID($_fName, $_lName, $_email){
//     $fName = $_fName;
//     $lName = $_lName;
//     $email = $_email;
//     global $con;
//     $userID = mysqli_query($con,"SELECT User_ID 
//                                     FROM user 
//                                     WHERE First_Name = '$fName'
//                                     AND Last_Name = '$lName'
//                                     AND Email = '$email'");
                                    
// }
// return $userID
?>