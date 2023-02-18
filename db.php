<?php 
require "pdo.php"; 
$sql = "SELECT * FROM users"; 
$stmt = $conn->prepare($sql);
$stmt->execute(); 
$users = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
