<?php
include "../Model/db.php";
session_start();

if(!isset($_SESSION["logged_in"]))
{
    header("Location: Login.php");
    exit();
}

$title = "";
$description = "";
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $valid = true;

    if(empty($title))
    {
        $message .= "Title is required<br>";
        $valid = false;
    }

    if($valid)
    {
        $database = new db();
        $connection = $database->connection();
        $user_id = $_SESSION["user_id"];
        $result = $database->addTask(
            $connection,
            "tasks",
            $user_id,
            $title,
            $description
        );


        if($result)
        {
            header("Location: Dashboard.php");
            exit();
        }
        else
        {
            $message = "Task could not be added";
        }
    }
}

?>