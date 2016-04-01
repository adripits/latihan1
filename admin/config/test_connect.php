<?php
require_once('connection.php');

$con = new connectionDB();

$con->connect();
$con->disconnect();

echo $con->logs;
?>