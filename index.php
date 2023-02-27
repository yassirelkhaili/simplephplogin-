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
    <label for="exampleInputEmail1" class="form-label">Email Address:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pword" required>
  </div>
  <div class="preset" style="padding-bottom: 18px;">
<a href="./preset.php">Forgot Password?</a>
  </div>
  <?php if ((isset($_POST["signup"]))): ?>
    <?php 
      $Semail = $_POST["Semail"]; 
      $fname = $_POST["fname"]; 
      $lname = $_POST["lname"]; 
      $Spword = $_POST["Spword"]; 
      $role = $_POST["role"];
      $sql="INSERT INTO users(fname,lname,email,password,role_id) VALUES(:fname,:lname,:Semail,:pword,:role_id)"; 
$stmt = $conn->prepare($sql);
      ?>
  <?php if($stmt->execute([":fname" => $fname, ":lname" => $lname, ":Semail" => $Semail, ":pword" => $Spword, "role_id" => $role])): ?>
    <p class="alert alert-success" role="alert" style="padding: 8px;">
    Your Account Has Been Created Successfully
        </p>
    <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($_GET["signupError"])): ?>
        <p class="alert alert-danger" role="alert" style="padding: 8px;">
        Please Verify Your Input
        </p>
        <?php endif; ?>
  <button type="submit" class="btn btn-danger" name="submit">Send</button>
  <button type="button" class="btn btn-success" style="float: right;" data-signup>Sign Up</button>
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