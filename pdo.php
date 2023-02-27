<?php 
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$servername = $_ENV["DB_SERVER"]; 
$username = $_ENV["DB_NAME"];
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=phpcrud", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }