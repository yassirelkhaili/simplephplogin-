<?php 
require "header.php"; 
?>
<div class="container">
    <div class="card">
    <div class="card-header">
        <h2>Login:</h2>
        </div>
        <div class="card-body">
<form class="main-form" method="post" action="index.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email Address:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Semail" required>
  </div>
  <input type="radio" id="student" name="role" value="1">
  <label for="student">Student</label><br>
  <input type="radio" id="prof" name="role" value="2">
  <label for="prof">Professor</label><br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Firstname:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="fname" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Lastname:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lname" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="Spword" required>
  </div>
  <button type="submit" class="btn btn-danger" name="signup">Send</button>
</form>
</div>
</div>
</div>
<?php require "footer.php" ?>