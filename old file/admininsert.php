<?php

require 'admincon.php';

$tskID = $_POST["tid"];
$tskname = $_POST["tname"];
$tsktype = $_POST["ttype"];
$tskdate = $_POST["tdate"];
$tskdesc = $_POST["tdes"];
$tskstatus = $_POST["tstatus"];

// Prepare the SQL query
$sql = "INSERT INTO admin_task VALUES ('$tskID', '$tskname', '$tskdesc', '$tskstatus', '$tskdate', '$tsktype')";

if ($con->query($sql)) {
    echo "Insert successful";
} else {
    echo "Error: " . $con->error; // Use the connection object to get the error
}

$con->close();

?>