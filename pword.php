<?php 
require "header.php";
require "db.php";  
?>
<?php if(isset($_POST["submitcode"])): ?>
    <?php 
        $S_code = $_POST["code"]; 
    ?>
<?php foreach($users as $user): ?>
  <?php if($user->S_code === $S_code): ?>
    <div class="container">
    <div class="card">
    <div class="card-header">
<h2 id="title">Votre Mot de Passe</h2>
        </div>
        <div class="card-body">
    <form class="main-form">
  <div class="mb-3" id="special-code" style="margin-bottom: 0px !important;">
    <label for="exampleInputEmail1" class="alert alert-success" role="alert" style="margin-bottom: 0px !important;">Mot de Passe: <strong><?php echo $user->password;?></strong></label>
  </div>
</form>
<?php exit; ?>
<?php else: ?>
  <?php 
    header("location: verify.php?badcode"); 
    ?>
  <?php exit; ?>
  <?php endif; ?>
  <?php endforeach;?>
<?php endif; ?>
<?php require "footer.php" ?>