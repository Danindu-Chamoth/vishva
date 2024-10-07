<?php

require 'admincon.php';

$sql="SELECT task_id, task_name, description, status, date, task_type FROM admin_task";

$result=$con->query($sql);


if($result->num_rows > 0)
{
    echo "<table border>";
    while($row=$result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["task_id"]."</td>"."<td>".$row["task_name"]."</td>"."<td>".$row["description"]."</td>"."<td>".$row["status"]."</td>"."<td>".$row["date"]."</td>"."<td>".$row["task_type"]."</td>";
        echo "</tr>";
    }
    echo "</table>";

}
else{
    echo "No Results";
}

$con->close();

?>

<html>
    <head>
        <title>adtasks</title>
        <link rel="stylesheet" href="admintask.css">

    </head>
    <body>
        <div class="frame">
            

           <div class="sec1">
              <div class="minisec1">
                <fieldset>
                    <form method="post" action="adminupdate.php" > 
                        
                        <h2>Task details</h2>
                        
                        <input type="text" id="textbox1" placeholder="Task Id"  name="tid"><br><br>
                        <input type="text" id="textbox1" placeholder="task name" name="tname"><br><br>
                        <input type="text" id="textbox1" placeholder="task type" name="ttype"><br><br>
                        <input type="date" id="textbox1" placeholder="Date" name="tdate"><br><br>
                        <input type="text" id="textbox1" placeholder="Description" name="tdes"><br><br>
                        <input type="text" id="textbox1" placeholder="Status" name="tstatus"><br><br>
                        <input type="submit"  value="Update">
                        
                    </form>
                </fieldset>
              </div>
           </div>

           

    </body>
</html>