<?php
function auth ($users, $email, $pword) {
    foreach ($users as $user) {
        if ($user->email === $email && $user->password === $pword) {
            return "Connecté Avec Succès"; 
            exit; 
        }
}
header("location: index.php?signupError"); 
}
