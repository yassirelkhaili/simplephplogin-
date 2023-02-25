<?php require "header.php"; ?>
<div class="container">
    <div class="card">
    <div class="card-header">
<h2 id="title">Veuillez Vérifier Votre Boîte De Réception</h2>
        </div>
        <div class="card-body">
    <form class="main-form" method="post" action="pword.php">
  <div class="mb-3" id="special-code">
    <label for="exampleInputEmail1" class="form-label">Code:</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="code" required>
  </div>
  <?php if(isset($_GET["badcode"])): ?>
        <p class="alert alert-danger" role="alert" style="padding: 8px;">
        Code Erroné: Veuillez Vérifier Votre Code.
        </p>
        <?php endif; ?>
  <button type="submit" class="btn btn-danger" name="submitcode">Envoyer</button>
</form>
<?php require "footer.php"; ?>