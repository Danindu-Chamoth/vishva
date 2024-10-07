<?php

$con = new mysqli("localhost", "root", "", "training_management");
if($con->connect_error)
{
    die("Connection failed".$con->connect_error);
}

?>