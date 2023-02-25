<?php 
require "header.php"; 
?>
<div class="container">
    <div class="card">
    <div class="card-header">
        <h2>Login:</h2>
        </div>
        <div class="card-body">
<form class="main-form" method="post" action="main.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot De Passe:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pword" required>
  </div>
  <div class="preset" style="padding-bottom: 18px;">
<a href="./preset.php">Mot De Passe Oublié?</a>
  </div>
    <?php if(isset($_GET["signupError"])): ?>
        <p class="alert alert-danger" role="alert" style="padding: 8px;">
        Vérifier Vos Identifiants
        </p>
        <?php endif; ?>
  <button type="submit" class="btn btn-danger" name="submit">Envoyer</button>
</form>
</div>
</div>
</div>
<?php require "footer.php" ?>