<?php

include 'config.php';

// Start the session
session_start();

// Query to get the user with UID = U2001
$uid = 'U2001';
$sql = "SELECT * FROM users WHERE UID = '$uid' LIMIT 1";
$result = $conn->query($sql);

// Check if the query returned the user
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['loggedin'] = true;
    $_SESSION['user_id'] = $user['UID'];
    $_SESSION['fname'] = $user['Fname'];
    $_SESSION['email'] = $user['Email'];
} else {
    die("User with UID $uid not found.");
}

// Ensure user is logged in
if (!isset($_SESSION['loggedin'])) {
    die("User not logged in.");
}

// Get the logged-in user's UID
$uid = $_SESSION['user_id'];

// Fetch tasks for the logged-in user
$tasks = [];
$sql = "SELECT * FROM tasks WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

// Handle Task Creation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $task_id = $_POST['task_id'] ?? 0;
    $task_name = $_POST['task_name'] ?? '';

    if ($action == 'add') {
        $stmt = $conn->prepare("INSERT INTO tasks (user_id, task_name, task_status, created_at) VALUES (?, ?, 'pending', NOW())");
        $stmt->bind_param("ss", $uid, $task_name);
        $stmt->execute();
        $stmt->close();
        exit("Task added successfully.");
    }

    if ($action == 'delete') {
        $stmt = $conn->prepare("DELETE FROM tasks WHERE task_id = ? AND user_id = ?");
        $stmt->bind_param("ss", $task_id, $uid);
        $stmt->execute();
        $stmt->close();
        exit("Task deleted successfully.");
    }

    if ($action == 'update') {
        $stmt = $conn->prepare("UPDATE tasks SET task_name = ? WHERE task_id = ? AND user_id = ?");
        $stmt->bind_param("sss", $task_name, $task_id, $uid);
        $stmt->execute();
        $stmt->close();
        exit("Task updated successfully.");
    }
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);