<?php
$server = "localhost";
$username = "root";
$password = "mysql";


try {
  $conn = new PDO("mysql:host=$server;dbname=blog", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>