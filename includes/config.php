<?php 
require_once("includes/config.php");

if(!isset($_SESSION["userLoggedIn"])) {
    header("Location: register.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to DisneyMinus!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper">