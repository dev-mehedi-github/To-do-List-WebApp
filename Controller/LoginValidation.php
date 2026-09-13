<?php
include "../Model/db.php";
session_start();
$name = "";
$password = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $valid = true;

    if (empty($name) || strlen($name) < 5) {
        $message .= "User Name Must be Valid (atleast 5 char)<br>";
        $valid = false;
    }
    if (empty($password) || strlen($password) < 5) {
        $message .= "Password Must be Valid (atleast 5 char)<br>";
        $valid = false;
    }

    if ($valid) {
        $database = new db();
        $connection = $database->connection();

        // Get user by username
        $result = $database->getUser($connection, "users", $name);

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
                $_SESSION["logged_in"] = true;
                $_SESSION["username"] = $name;
                $_SESSION["user_id"] = $user["id"];
                header("Location: ../View/Dashboard.php");
                exit();
            } else {
                $message = "Invalid username or password";
            }
        } else {
            $message = "Invalid username or password";
        }
    }
}
?>