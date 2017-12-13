<?php
include 'userDAL.php';
include 'deviceDAL.php';
include 'groupDAL.php';

// echo addUser('Chad', 'Lofgren', 'chadlof', 'qwerty', '123456789', 'chadlof@gmail.com');
// echo deleteUser();
// echo editUser(4,'bob', 'Lofgren', 'chadlof', 'qwerty', '123456789', 'chadlof@gmail.com', 'pic', 'brown', '185', 'white', 'home');
// echo addDevice(5,987654321,'test');
// echo deleteDevice();
// echo editDevice(2, 5, 147852369,'test2');
// echo addGroup("Home Group");
// echo deleteGroup();
echo editGroup(4,'test3')

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
?>