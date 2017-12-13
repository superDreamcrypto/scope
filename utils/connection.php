<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'group_scope';

// $con = new mysqli("localhost","root","","group_scope");
$con = mysqli_connect("localhost","root","","group_scope");
mysql_connect($host, $user, $pass);
$con2 = mysql_select_db($db);

if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


?>