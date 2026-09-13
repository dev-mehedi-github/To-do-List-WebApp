<?php
include "../Model/db.php";
session_start();

$name = "";
$password = "";
$message = "";
$remember = false;

if (isset($_COOKIE["remember_user"])) {
    $name = $_COOKIE["remember_user"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["remember"]);
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
        $result = $database->signin($connection, "users", $name);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                $_SESSION["logged_in"] = true;
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];

                if ($remember) {
                    setcookie("remember_user", $name, time() + (30 * 24 * 60 * 60), "/");
                } else {
                    setcookie("remember_user", "", time() - 3600, "/");
                }

                header("Location: Dashboard.php");
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
