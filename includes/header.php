<?php
ob_start();
session_start();

date_default_timezone_set("America/Edmonton");

try {
    $con = new PDO("mysql:dbname=disneyminus;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
