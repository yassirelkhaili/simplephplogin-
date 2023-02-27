<?php require "header.php"; ?>
<div class="container">
    <div class="card">
    <div class="card-header">
<h2 id="title">Please Check your inbox</h2>
        </div>
        <div class="card-body">
    <form class="main-form" method="post" action="pword.php">
  <div class="mb-3" id="special-code">
    <label for="exampleInputEmail1" class="form-label">Code:</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="code" required>
  </div>
  <?php if(isset($_GET["badcode"])): ?>
        <p class="alert alert-danger" role="alert" style="padding: 8px;">
        Wrong Input: Please Verify Your Code.
        </p>
        <?php endif; ?>
  <button type="submit" class="btn btn-danger" name="submitcode">Send</button>
</form>
<?php require "footer.php"; ?>