
<?php

include "../Model/db.php";
session_start();

if(!isset($_SESSION["logged_in"]))
{
    header("Location: ../View/Login.php");
    exit();
}

$database = new db();
$connection = $database->connection();

$user_id = $_SESSION["user_id"];

$tasks = $database->getTasks(
    $connection,
    "tasks",
    $user_id
);

$message = "";

?>

