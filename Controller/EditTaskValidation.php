<?php
include "../Model/db.php";

session_start();

if(!isset($_SESSION["logged_in"])) {
    header("Location: Login.php");
    exit();
}

$title = "";
$description = "";
$status = "";
$message = "";
$user_id = $_SESSION["user_id"];
$id = intval($_GET["id"] ?? 0);

$database = new db();
$connection = $database->connection();

if($id <= 0) {
    header("Location: Dashboard.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $database->getTask($connection, "tasks", $id, $user_id);

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $description = $row["description"];
        $status = $row["status"];
    } else {
        header("Location: Dashboard.php");
        exit();
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $status = trim($_POST["status"] ?? "Pending");
    $valid = true;

    if(empty($title)) {
        $message = "Title is required";
        $valid = false;
    }

    if($valid) {
        $result = $database->updateTask($connection, "tasks", $id, $user_id, $title, $description, $status);

        if($result) {
            header("Location: Dashboard.php");
            exit();
        } else {
            $message = "Task could not be updated";
        }
    }
}
?>
