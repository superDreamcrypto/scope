<?php
if(isset($_POST['get_option']))
{
 $host = 'localhost';
 $user = 'root';
 $pass = '';
 mysql_connect($host, $user, $pass);
 mysql_select_db('group_scope');

 $group = $_POST['get_option'];
//  echo $group;
//  $member=mysql_query("SELECT Username 
//                     FROM user 
//                     JOIN groupuser
//                         ON user.User_ID = groupuser.GroupUser_User_ID
//                     JOIN `group`
//                         ON grour.Group_ID = groupuser.GroupUser_Group_ID 
//                     WHERE Group_Name ='$group'");

 $member=mysql_query("SELECT DISTINCT `Username` 
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
</div>
<?php
?>