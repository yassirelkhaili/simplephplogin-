<?php 
$servername = "sql213.epizy.com";
$username = "epiz_33623642";
$password = "G8Ul6dEpk8";
try {
    $conn = new PDO("mysql:host=$servername;dbname=epiz_33623642_phpcrud", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }