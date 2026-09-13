<?php
include "../Model/db.php";

session_start();

$name = "";
$password = "";
$con_password = "";
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $password = trim($_POST["pass"] ?? "");
    $con_password = trim($_POST["con_pass"] ?? "");
    $valid = true;

    if(empty($name) || strlen($name) < 5) {
        $message .= "User Name Must be Valid (atleast 5 char)<br>";
        $valid = false;
    }

    if(empty($password) || strlen($password) < 5) {
        $message .= "Password Must be Valid (atleast 5 char)<br>";
        $valid = false;
    }

    if($password != $con_password) {
        $message .= "Password not matched<br>";
        $valid = false;
    }

    if($valid) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $database = new db();
        $connection = $database->connection();

        $result = $database->signup($connection, "users", $name, $hashed_password);

        if($result) {
            $user_data = [];
            $file = "../Model/user.json";

            if(file_exists($file)) {
                $json_data = file_get_contents($file);
                $user_data = json_decode($json_data, true);
                if(!is_array($user_data)) {
                    $user_data = [];
                }
            }

            $user_data[] = [
                "name" => $name,
                "password" => $hashed_password,
                "timestamp" => date("Y-m-d H:i:s")
            ];

            file_put_contents($file, json_encode($user_data, JSON_PRETTY_PRINT));
            header("Location: Login.php");
            exit();
        } else {
            $message = "Registration failed";
        }
    }
}
?>
