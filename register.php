<?php
if (empty($_POST['regBtn']) === false) {
    $required_fields = array('email','password','password_again');
    foreach($_POST as $key=>$value) {
        if ((empty($value) && in_array($key, $required_fields) === true) || $_POST['city'] == "Välj stad") {
            $errors[] = 'Fields marked with an asterisk are required';
            break 1;
        }
    }
    
    if (empty($errors) === true) {
        if (user_exists($_POST['email']) === true) {
            $errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already taken.'; 
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email';
        }
        if (strlen($_POST['password']) < 6) {
            $errors[] = 'Your password must be at least 6 characters';
        }
        if ($_POST['password'] !== $_POST['password_again']) {
            $errors[] = 'Your passwords do not match';
        }
    }
}

if (empty($_POST['regBtn']) === false && empty($errors) === true) {
    $register_data = array (
            'email'         => $_POST['email'],
            'password'      => $_POST['password'],
            'city'          => $_POST['city'],
    );
    register_user($register_data);
    header('Location: register.php?success');
    echo 'Success!';
    exit(); }    

else if (empty($errors) === false) {
        echo output_errors($errors);
}
?>

<form method="post" id="regForm" name="regForm" action="">
    <h2>Registrera dig här</h2>
    <input type="text" name="email" placeholder="E-mail">           
    <input type="password" name="password" placeholder="Lösenord">
    <input type="password" name="password_again" placeholder="Upprepa lösenord">
    <select name="city">
        <option selected="true" style="display:none;" value="Välj stad">Välj stad</option>
        <option value="Borås">Borås</option>
        <option value="Eskilstuna">Eskilstuna</option>
        <option value="Gävle">Gävle</option>
        <option value="Göteborg">Göteborg</option>
        <option value="Helsingborg">Helsingborg</option>
        <option value="Jönköping">Jönköping</option>
        <option value="Linköping">Linköping</option>
        <option value="Lund">Lund</option>
        <option value="Malmö">Malmö</option>
        <option value="Norrköping">Norrköping</option>
        <option value="Stockholm">Stockholm</option>
        <option value="Umeå">Umeå</option>
        <option value="Uppsala">Uppsala</option>
        <option value="Västerås">Västerås</option>
        <option value="Örebro">Örebro</option>
    </select>
    <input type="submit" class="btn" name="regBtn" value="Skapa konto">
</form>

