<?php
$servername="10.153.214.138";
$username="web3";
$password="web3";
$dbname="p1_equipt_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}