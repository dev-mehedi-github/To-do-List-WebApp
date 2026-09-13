<?php
include "../Model/db.php";

session_start();

if(!isset($_SESSION["logged_in"]))
{
    header("Location: ../View/Login.php");
    exit();
}

$id = intval($_GET["id"] ?? 0);
$user_id = $_SESSION["user_id"];

if($id > 0)
{
    $database = new db();
    $connection = $database->connection();
    $database->completeTask(
        $connection,
        "tasks",
        $id,
        $user_id
    );

}

header("Location: ../View/Dashboard.php");
exit();

?>