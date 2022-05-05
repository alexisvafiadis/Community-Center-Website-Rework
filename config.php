<?php
$hostName = "localhost";
$userName = "root";
$pass = "";
$databaseName = "saith";
 $conn = new mysqli($hostName, $userName, $pass, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>