<?php

require 'admincon.php';

$tsid = $_POST["tid"];
$tsname = $_POST["tname"];
$tstype = $_POST["ttype"];
$tsdate = $_POST["tdate"];
$tsdes = $_POST["tdes"];
$tsstatus = $_POST["tstatus"];


if(empty($tsid) ||empty($tsname) || empty($tsdes) ||empty($tsstatus) || empty($tsdate) || empty($tstype) )
{
    echo "All required";
}
else
{
    $sql="UPDATE admin_task set task_name='$tsname', description='$tsdes', status='$tsstatus', date='tsdate', task_type='$tstype' WHERE task_id = '$tsid'";

    if($con->query($sql))
    {
        echo "Updated";
    }
    else
    {
        echo "Not Updated";
    }
}



?>