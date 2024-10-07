<?php

require 'admincon.php';

$tkid=$_POST["tid"];

$sql =  "DELETE FROM admin_task WHERE task_id='$tkid'";

if($con->query($sql))
{
    echo "Deleted";
}
else
{
    echo "Not Deleted";
}

?>