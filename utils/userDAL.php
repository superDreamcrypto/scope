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

    $sql = "SELECT *
    FROM `user` 
    WHERE `Username` = '$uName'";

    if ($result = mysqli_query($con, $sql))
    {
        if( mysqli_num_rows($result) == 0)
        {
            
            $sql = "INSERT INTO user (User_ID, First_Name, Last_Name, User_Phone_Num, Email, Username, Password, Image_Name, Hair_Color, Weight, Ethnicity, Lat, Lon)
            VALUES (null, '$fName', '$lName',  '$phone', '$email','$uName', '$password', null, null, null, null, null, null)";
            
            if ($con->query($sql) === TRUE) 
            {
                $Message = "New user record created successfully \n";
                return $Message;
            } else 
            {
                $Message = "Error: " . $sql . "\n" . $con->error;
                return $Message;
            }
            
            // mysqli_close($con);
            // unset($con);
            // return $Mesage;

        }
        else 
        {
            $Message = 'The username "'.$uName.'" is alresady taken. \n Please try another!';
            header('Location: ./signUp.php?Message='.$Message);
        }
    }
    else
    {
        $Message = "Error: " . $sql . "\n" . $con->error;
        return $Mesage;
    }

    // mysqli_close($con);
    unset($con);
    return $Message;
}




function deleteUser($_id){
    global $con;
    $id = $_id;
  
    mysqli_query($con,"DELETE FROM groupuser WHERE GroupUser_User_ID = '$id'");
    mysqli_query($con,"DELETE FROM user WHERE User_ID = '$id'");
    // mysqli_close($con);
    unset($con);
    // header("location:suadminhome.php");
    echo "Your selection has been deleted";
    
}



function editUser($_id, $_fName, $_lName, $_uName, $_password, $_role, $_phone, $_email, $_image, $_hair, $_weight, $_ethnicity, $_lat, $_lon ){
    $id = $_id;
    $fName = $_fName;
    $lName = $_lName;
    $uName = $_uName;
    $password = $_password;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = $_role;
    $phone = $_phone;
    $email = $_email;
    $image = $_image;
    $hair = $_hair;
    $weight = $_weight;
    $ethnicity = $_ethnicity;
    $lat = $_lat;
    $lon = $_lon;
    
    global $con;
    $sql = "UPDATE user 
            SET User_ID = '$id', First_Name = '$fName', Last_Name = '$lName', User_Phone_Num = '$phone', Email = '$email', Username = '$uName', `Password` = '$hashed_password', `Role` = '$role', Image_Name = '$image', Hair_Color = '$hair', `Weight` = '$weight', Ethnicity = '$ethnicity', Lat = $lat, Lon = $lon
            WHERE User_ID = '$id'";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['fName'] = $fName;
        $_SESSION['lName'] = $lName;
        $_SESSION['uName'] = $uName;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['imageName'] = $image;
        $_SESSION['hair'] = $hair;
        $_SESSION['weight'] = $weight;
        $_SESSION['ethnicity'] = $ethnicity;
        $Message = "Your profile has been updated!";
    } else {
        $Message = "Error: " . $sql . "<br>" . $con->error;
    }

    // mysqli_close($con);
    unset($con);
    return $Message;

}


function addUserToSession($_uName, $_password){
    session_unset();
    $uName = $_uName;
    $password = $_password;
    global $con;
    $query = "SELECT * 
                FROM user
                WHERE Username = '$uName'";
                
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
    $_SESSION['lat'] = $row['Lat'];
    $_SESSION['lon'] = $row['Lon'];
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
function getUserByUsername($username)
{
    $query = "SELECT * 
    FROM user
    WHERE `Username` = '$username'";
   return fillUser($query);
}

function getUserByID($id){
    
    $query = "SELECT * 
                FROM user
                WHERE `User_ID` = $id";
    return fillUser($query);
          
}
function fillUser($query)
{
    global $con;
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
    $lat = $row['Lat'];
    $lon = $row['Lon'];

        $userArray = array(
            $userID,$fName,$lName,$uName,$phone,$email,$password
            ,$role,$imageName,$hair,$weight,$ethnicity,$lat,$lon
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
    $password = $_password;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT)
;
    if(password_verify($password, $hashed_password))
    {
        $uName = $_uName;
        // $password = password_verify($_password, $hashed_password);
        global $con;
        $query = "SELECT * 
                    FROM user
                    WHERE `Username` = '$uName'";
                    
        
        if ($result = mysqli_query($con, $query))
        {
            if( mysqli_num_rows($result) != 0)
            {
                // exit('you have seccefully signed in!');
            }
            else
            {	
                $Message = "Invalid username! Try again! ";
                header('Location: ./signIn.php?Message='.$Message);
            }
        }
        
        else 
        {
        echo "Error: " . $query . "<br>" . $con->error;
        }
    }
    else
    {
        $Message = "Invalid  password! Try again!";
        header('Location: ./signIn.php?Message='.$Message);
    }
    
    // mysqli_close($con);
    unset($con);
}
?>