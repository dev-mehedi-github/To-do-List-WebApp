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

        // Check if username already exists
        $checkResult = $database->getUser($connection, "users", $name);
        if ($checkResult && $checkResult->num_rows > 0) {
            $message = "Username already taken. Please choose another.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $result = $database->signup($connection, "users", $name, $hashedPassword);
            if ($result) {
                $message = "Registration Successful! <a href='login.php'>Login here</a>";
            } else {
                $message = "Please try again";
            }
        }
    }
}
?>