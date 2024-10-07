<?php
include 'admincon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id='$id'";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $task_name = $_POST['task_name'];

    $sql = "UPDATE tasks SET name='$task_name' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Task updated successfully";
    } else {
        echo "Error updating task: " . $conn->error;
    }
    header("Location: admintask.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <form action="adminupdate.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="text" name="task_name" value="<?php echo $task['name']; ?>">
        <input type="submit" value="Update Task">
    </form>
</body>
</html>
