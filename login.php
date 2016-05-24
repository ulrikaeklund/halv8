<?php
if (empty($_POST['loginBtn']) === false) {
    $email = $_POST['email'];
    $password =  $_POST['password'];
    if (empty($email) || empty($password)) {
        $errors['1'] = 'You need to enter email and password.'; }
    
    else if (user_exists($email) === false) {
        $errors['2'] = 'That email is not registred.'; }
        
    else {
        $password = encrypt_password($email, $password);
        $login = login($email, $password);
        if ($login === false) {
            $errors['3'] = 'That username/password combination is incorrect.'; }
        else {
            $_SESSION['user_id'] = $login;
            echo '<script type="text/javascript">
                window.location = "bjudning.php"
            </script>';
            exit();
            }
    }   

    echo '<script type="text/javascript">
                window.alert("' . $errors['1'], $errors['2'], $errors['3'] . '");
          </script>';
} ?>