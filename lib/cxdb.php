<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinostalgie";

$cx = new mysqli($servername, $username, $password, $dbname);

if ($cx->connect_error) {
  die("Connection failed: " . $cx->connect_error);
}

?>