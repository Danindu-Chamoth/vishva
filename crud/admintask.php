<?php include 'admincon.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link rel="stylesheet" href="admintask.css">
</head>
<body>
    <div class="frame">
        <div class="sec1">
            <h2>Manage Tasks</h2>
            <form action="admininsert.php" method="POST">
                <fieldset>
                    <legend>Add Task</legend>
                    <input type="text" id="textbox1" name="task_name" placeholder="Task Name" required>
                    <input type="submit" value="Add Task">
                </fieldset>
            </form>
        </div>
        <div class="sec1">
            <h2>Task List</h2>
            <?php include 'adminread.php'; ?>
        </div>
    </div>
</body>
</html>
