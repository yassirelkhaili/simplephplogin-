<?php 
require "header.php"; 
require "db.php"; 
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
  <?php if ((isset($_POST["signup"]))): ?>
    <?php 
      $Semail = $_POST["Semail"]; 
      $fname = $_POST["fname"]; 
      $lname = $_POST["lname"]; 
      $Spword = $_POST["Spword"]; 
      $role = $_POST["role"];
      $sql="INSERT INTO users(fname,lname,email,password,role_id) VALUES(:fname,:lname,:email,:pword,:role_id)"; 
$stmt = $conn->prepare($sql);
      ?>
  <?php if($stmt->execute([":fname" => $fname, ":lname" => $lname, ":email" => $Semail, ":pword" => $Spword, "role_id" => $role])): ?>
    <p class="alert alert-success" role="alert" style="padding: 8px;">
    Votre Compte a été créé avec succès
        </p>
    <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($_GET["signupError"])): ?>
        <p class="alert alert-danger" role="alert" style="padding: 8px;">
        Vérifier Vos Identifiants
        </p>
        <?php endif; ?>
  <button type="submit" class="btn btn-danger" name="submit">Envoyer</button>
  <button type="button" class="btn btn-success" style="float: right;" data-signup>S'inscrire</button>
</form>
<script>
  const signupBtn = document.querySelector("[data-signup]")
  signupBtn.addEventListener("click", () => {
  document.location.href="./signup.php"
  })
</script>
</div>
</div>

</div>
<?php require "footer.php" ?>