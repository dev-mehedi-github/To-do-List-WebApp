<?php
session_start();

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("Location: View/Dashboard.php");
    exit();
} else {
    header("Location: View/login.php");
    exit();
}
?>