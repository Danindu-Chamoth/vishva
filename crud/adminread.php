<?php
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . " - <a href='adminupdate.php?id=".$row["id"]."'>Edit</a> | <a href='admindelete.php?id=".$row["id"]."'>Delete</a></li>";
    }
    echo "</ul>";
} else {
    echo "No tasks found";
}
?>
