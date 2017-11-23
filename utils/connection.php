<?php
// 	$host = 'localhost';
// 	$user = 'root';
// 	$pass = '';
// $database = 'group_scope';

// $db = new PDO('mysql:host='.$host.';
// 					dbname='.$database, $user, $pass);

// if(!$db)
// {
//    echo "unable to connect to database";
// }

$con = mysqli_connect("localhost","root","","group_scope");

if(!$con)
{
   echo "unable to connect to database";
}
// if ($con->connect_errno())
// {
// 	echo "Failed to connect to MySql: " . mysqli_connect_error();
// }
?>