<?php

// $con = new mysqli("localhost","root","","group_scope");
$con = mysqli_connect("localhost","root","","group_scope");


if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


?>