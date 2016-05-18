<?php
if (empty($_POST['loginBtn']) === false) {
    $email = $_POST['email'];
    $password =  $_POST['password'];
    if (empty($email) || empty($password)) {
        $errors[] = 'You need to enter email and password.'; }
    
    else if (user_exists($email) === false) {
        $errors[] = 'That email is not registred.'; }
        
    else {
        $password = encrypt_password($email, $password);
        $login = login($email, $password);
        if ($login === false) {
            $errors[] = 'That username/password combination is incorrect.'; }
        else {
            $_SESSION['user_id'] = $login;
            header('Location: bjudning.php');
            exit();
            }
    }   } ?>

<form method="post" id="loginForm" action=""> 
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Lösenord">
    <input type="submit" class="btn" name="loginBtn" value="Logga in">
</form>