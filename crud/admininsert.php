<?php
include 'admincon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];

    $sql = "INSERT INTO tasks (name) VALUES ('$task_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New task created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: admintask.php");
}
?>
