<?php
require "header.php";
require "auth.php";
if (!isset($_POST["submit"])) {
    header("location: index.php"); 
}
require "db.php";
$email = $_POST["email"];
$pword = $_POST["pword"]; 
auth($users,$email,$pword);
?>
    <h1>Main Page</h1>
    <div class="alert alert-success" role="alert">
<?php  echo auth($users,$email,$pword); ?>
<?php require "footer.php"; ?>
