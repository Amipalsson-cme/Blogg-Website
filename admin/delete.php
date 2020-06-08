<?php
require 'config.php';

$id = $_GET['id'];
$sql = 'DELETE FROM posts WHERE id=:id';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id])) {
   header("Location: dashboard.php");
}