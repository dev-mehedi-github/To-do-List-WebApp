<?php
include "../Model/db.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$message = "";
$tasks = null;

$database = new db();
$connection = $database->connection();

// Handle Add Task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_task"])) {
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");

    if (empty($title)) {
        $message = "Task title cannot be empty";
    } else {
        $result = $database->addTask($connection, "tasks", $user_id, $title, $description);
        if ($result) {
            $message = "Task added successfully!";
        } else {
            $message = "Failed to add task";
        }
    }
}

// Handle Complete Task
if (isset($_GET["complete"])) {
    $id = $_GET["complete"];
    $result = $database->completeTask($connection, "tasks", $id, $user_id);
    if ($result) {
        $message = "Task marked as completed!";
    } else {
        $message = "Failed to complete task";
    }
}

// Handle Delete Task
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $result = $database->deleteTask($connection, "tasks", $id, $user_id);
    if ($result) {
        $message = "Task deleted successfully!";
    } else {
        $message = "Failed to delete task";
    }
}

// Fetch all tasks for the logged-in user
$tasks = $database->getTasks($connection, "tasks", $user_id);
?>