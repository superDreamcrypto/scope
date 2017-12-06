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
    
    // mysqli_close($con);
    unset($con);

}




function deleteUser($_id){
    global $con;
    $id = $_id;
    // $id = $_GET['id'];
    // $query = mysqli_query($con,"SELECT * FROM user WHERE User_ID = '$id'");
    // $imageFile = mysqli_fetch_assoc($query);
    // unlink("img/main/" .$imageFile['name']);
    mysqli_query($con,"DELETE FROM user WHERE User_ID = '$id'");
    // mysqli_close($con);
    unset($con);
    // header("location:suadminhome.php");
    echo "Your selection has been deleted";
    
}



function editUser($_id, $_fName, $_lName, $_uName, $_password, $_role, $_phone, $_email, $_image, $_hair, $_weight, $_ethnicity, $_last ){
    $id = $_id;
    $fName = $_fName;
    $lName = $_lName;
    $uName = $_uName;
    $password = $_password;
    $role = $_role;
    $phone = $_phone;
    $email = $_email;
    $image = $_image;
    $hair = $_hair;
    $weight = $_weight;
    $ethnicity = $_ethnicity;
    $last = $_last;
    
    global $con;
    $sql = "UPDATE user 
            SET User_ID = '$id', First_Name = '$fName', Last_Name = '$lName', User_Phone_Num = '$phone', Email = '$email', Username = '$uName', `Password` = '$password', `Role` = '$role', Image_Name = '$image', Hair_Color = '$hair', `Weight` = '$weight', Ethnicity = '$ethnicity', Last_Location = '$last'
            WHERE User_ID = '$id'";
    
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // mysqli_close($con);
    unset($con);

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
    
    // mysqli_close($con);
    unset($con);
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
    
    // mysqli_close($con);
    unset($con);

}


function addUserToSession($_uName, $_password){
    session_unset();
    $uName = $_uName;
    $password = $_password;
    global $con;
    $query = "SELECT * 
                FROM user
                WHERE Username = '$uName'
                AND Password = '$password'";
    // if ($result = $con->query($query) === TRUE) 
    if ($result = mysqli_query($con, $query))
    {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $_SESSION['userID'] = $row['User_ID'];
    $_SESSION['fName'] = $row['First_Name'];
    $_SESSION['lName'] = $row['Last_Name'];
    $_SESSION['uName'] = $row['Username'];
    $_SESSION['phone'] = $row['User_Phone_Num'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['role'] = $row['Role'];
    $_SESSION['imageName'] = $row['Image_Name'];
    $_SESSION['hair'] = $row['Hair_Color'];
    $_SESSION['weight'] = $row['Weight'];
    $_SESSION['ethnicity'] = $row['Ethnicity'];
    $_SESSION['lastLocation'] = $row['Last_Location'];
//     $_SESSION['ThisSesssion']['Data'];
// unset($_SESSION['ThisSession']);    
    }
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }    
//    echo"db closed =". mysqli_close($con);  
unset($con);                  
}

function getUserByID($_id){
    $id = $_id; 
    global $con;
    $query = "SELECT * 
                FROM user
                WHERE `User_ID` = $id";
    
    if ($result = mysqli_query($con, $query))
    {
        
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    $userID = $row['User_ID'];
    $fName = $row['First_Name'];
    $lName = $row['Last_Name'];
    $uName = $row['Username'];
    $phone = $row['User_Phone_Num'];
    $email = $row['Email'];
    $password = $row['Password'];
    $role = $row['Role'];
    $imageName = $row['Image_Name'];
    $hair = $row['Hair_Color'];
    $weight = $row['Weight'];
    $ethnicity = $row['Ethnicity'];
    $last= $row['Last_Location'];

        $userArray = array(
            $id,$fName,$lName,$uName,$phone,$email,$password
            ,$role,$imageName,$hair,$weight,$ethnicity,$last
        );
    return $userArray;
    } 
    else 
    {
        echo "Error: " . $query . "<br>" . $con->error;
    }      
    // mysqli_close($con); 
    unset($con);                 
}


function validateUser($_uName, $_password){
    $uName = $_uName;
    $password = $_password;
    global $con;
    $query = "SELECT * 
                FROM user
                WHERE `Username` = '$uName'
                AND `Password` = '$password'";
    
    if ($result = mysqli_query($con, $query))
    {
        if( mysqli_num_rows($result) != 0)
        {
            // exit('you have seccefully signed in!');
        }
        else
        {	
            $Message = "Invalid username or password! ";
            header('Location: ./signIn.php?Message='.$Message);
        }
    }
    
    else 
    {
    echo "Error: " . $query . "<br>" . $con->error;
    }
    // mysqli_close($con);
    unset($con);
}
?>