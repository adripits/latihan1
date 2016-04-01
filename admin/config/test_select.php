<?php
require_once('connection.php');

$con = new connectionDB();

$table = "about_us";
$con->selectQuery($table);
echo $con->sql;

echo "<br>";

$table = "about_us";
$field = array(
	"title", "author", "date"
);
$con->selectQuery($table, $field);
echo $con->sql;

echo "<br>";

$table = "about_us";
$field = array(
	"title", "author", "date"
);
$where = array(
	"id_about_us" => "1",
	"category" => "NEW"
);
$con->selectQuery($table, $field, $where);
echo $con->sql;

?>