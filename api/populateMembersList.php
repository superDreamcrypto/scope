<?php
include '../utils/connection.php';

if(isset($_GET['groupName']))
{
    $con2;
 $group = $_GET['groupName'];
 

 $member=mysql_query("SELECT `Username` 
                        FROM `user`
                            LEFT JOIN `groupuser`
                            ON `user`.`User_ID` = `groupuser`.`GroupUser_User_ID` 
                            LEFT JOIN `group`
                            ON `group`.`Group_ID` = `groupuser`.`GroupUser_Group_ID` 
                            WHERE `group`.`Group_Name` = '$group'
                            ORDER BY `Username` ASC");
                      

while($row=mysql_fetch_array($member))
{
    echo "<option class='btn-drop-userhome'>".$row['Username']."</option>"; 

}
exit;
}
?>
