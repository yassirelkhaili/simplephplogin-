<?php
require "db.php";
require "header.php"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true); 

?>
<div class="container">
    <div class="card">
    <div class="card-header">
<?php if (!isset($_POST["submitemail"])): ?>
    <h2 id="title">Veuillez Saisir Votre Adresse E-mail</h2>
        </div>
        <div class="card-body">
    <form class="main-form" method="post" action="preset.php">
  <div class="mb-3" id="email-section">
    <label for="exampleInputEmail1" class="form-label">Adresse Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>
  <button type="submit" class="btn btn-danger" name="submitemail">Envoyer</button>
</form>
<?php else: ?>
  <?php $recoveryEmail = $_POST["email"]; ?>
  <?php foreach($users as $user): ?>
      <?php if($user->email === $recoveryEmail): ?>
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
        $subject = "Votre code Personel"; 
        $body = "Votre code Personel est: " . $S_code . "<br></br><strong>Important: ne partagez ce code avec personne, veuillez supprimez cet e-mail après utilisation</strong>"; 
        try {
          //Server settings                  
          $mail->isSMTP();                                            
          $mail->Host       = 'smtp.gmail.com';                     
          $mail->SMTPAuth   = true;                                   
          $mail->Username   = 'yassirelk3@gmail.com';                     
          $mail->Password   = 'rbekzsfxsrfzcygw';                               
          $mail->SMTPSecure = 'tls';            
          $mail->Port       = 587;    
          //Sender 
          $mail->setFrom('yassirelk3@gmail.com');                                  
          //Recipients
          $mail->addAddress($recoveryEmail);           
          //Content             
          $mail->isHTML();              
          $mail->Subject = $subject;
          $mail->Body    = $body;
          //Send email 
          $mail->send();
          echo "<h5>Votre Code personel à été envoyé par email</h5>";
      } catch (Exception $e) {
          echo "Votre Code personel na pas été envoyé par email Erreur: {$mail->ErrorInfo}";
      }  
      //Close smtp connection
      $mail->smtpClose(); 
          ?>
          <?php header("location: verify.php"); ?>
<?php exit; ?>
<?php else: ?>
  <h2 id="title">Adresse Email Erroné</h2>
        </div>
        <div style="display: flex; justify-content: center; padding: 10px;">
  <button type="button" class="btn btn-danger" name="return" style="max-width:fit-content;" data-btn>Retour à La Page D'accueil</button>
  </div>
</form>
<script>
  const btn = document.querySelector("[data-btn]"); 
  btn.addEventListener("click", () => {
    document.location.href="index.php"; 
  })
</script>
<?php exit; ?>
<?php endif; ?>
<?php endforeach; ?>
    <?php endif; ?>
</div>
</div>
</div>
<?php require "footer.php" ?>