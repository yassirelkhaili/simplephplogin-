<?php
require "db.php";
require "header.php"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$mail = new PHPMailer(true); 
?>
<div class="container">
    <div class="card">
    <div class="card-header">
<?php if (!isset($_POST["submitemail"])): ?>
    <h2 id="title">Enter Your Email Address</h2>
        </div>
        <div class="card-body">
    <form class="main-form" method="post" action="preset.php">
  <div class="mb-3" id="email-section">
    <label for="exampleInputEmail1" class="form-label">Email Address:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>
  <div class="g-recaptcha" data-sitekey="6Ld7gLskAAAAANWsoYJAYOmlre6vdovag2usDJ53"></div>
  <button type="submit" class="btn btn-danger" name="submitemail" value="submit">Send</button>
</form>
<?php else: ?>
  <?php $recoveryEmail = $_POST["email"]; 
  $recaptcha_secret_key = $_ENV["CAPTCHA_KEY"];
  $recaptcha_response = $_POST['g-recaptcha-response'];
  $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret_key.'&response='.$recaptcha_response);
  $response_data = json_decode($verify_response);
  ?>
  <?php if(!$response_data->success): ?>
    <h2 id="title">Captcha Submission Failed</h2>
        </div>
        <div style="display: flex; justify-content: center; padding: 10px;">
  <button type="button" class="btn btn-danger" name="return" style="max-width:fit-content;" data-captchaBtn>Back To Home Page</button>
  </div>
</form>
<script>
  const captchaBtn = document.querySelector("[data-captchaBtn]")
  captchaBtn.addEventListener("click", () => {
    document.location.href="index.php"; 
  })
</script>
        <?php exit; ?>
        <?php endif; ?>
  <?php foreach($users as $user): ?>
    <?php if ($user->email === $recoveryEmail): ?>
      <?php 
        foreach ($users as $user) {
          $S_code = rand(999, 9999999); 
          while($S_code === $user->S_code) {
            $S_code = rand(999, 9999999); 
          }
        }
        $sql = "UPDATE users SET S_code=:S_code WHERE email=:recoveryEmail"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute([":S_code" => $S_code, ":recoveryEmail" => $recoveryEmail]); 
        $subject = "Your Personal Access Code"; 
        $body = "Your Personal Code Is: " . $S_code . "<br></br><strong>Important: Don't Share This Code With Anyone, Delete This Email After Use.</strong>"; 
        try {
          //Server settings    
          $name = $_ENV["EMAIL_NAME"];
          $key = $_ENV["EMAIL_KEY"];               
          $mail->isSMTP();                                            
          $mail->Host       = 'smtp.gmail.com';                     
          $mail->SMTPAuth   = true;                                   
          $mail->Username   = $name;                     
          $mail->Password   = $key;                               
          $mail->SMTPSecure = 'tls';            
          $mail->Port       = 587;    
          //Sender 
          $mail->setFrom($name);                                  
          //Recipients
          $mail->addAddress($recoveryEmail);           
          //Content             
          $mail->isHTML();              
          $mail->Subject = $subject;
          $mail->Body    = $body;
          //Send email 
          $mail->send();
          echo "<h5>Your Personal Access Code Was Send By Email</h5>";
      } catch (Exception $e) {
          echo "We Were Unable To Send You A Verification Code Error: {$mail->ErrorInfo}";
      }  
      //Close smtp connection
      $mail->smtpClose(); 
          ?>
          <?php header("location: verify.php"); ?>
<?php exit; ?>
      <?php endif; ?>
<?php endforeach; ?>
<h2 id="title">Wrong Email Address</h2>
        </div>
        <div style="display: flex; justify-content: center; padding: 10px;">
  <button type="button" class="btn btn-danger" name="return" style="max-width:fit-content;" data-btn>Return To Login Page</button>
  </div>
</form>
<script>
  const btn = document.querySelector("[data-btn]"); 
  btn.addEventListener("click", () => {
    document.location.href="index.php"; 
  })
</script>
    <?php endif; ?>
</div>
</div>
</div>
<?php require "footer.php" ?>