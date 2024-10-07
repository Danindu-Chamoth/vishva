<?php
include 'admincon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tasks WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Task deleted successfully";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
    header("Location: admintask.php");
}
?>
