<?php
if (empty($_POST['regBtn']) === false) {
    $required_fields = array('email','password','password_again', 'first_name', 'last_name');
    foreach($_POST as $key=>$value) {
        if ((empty($value) && in_array($key, $required_fields) === true) || $_POST['city'] == "Välj stad") {
            $errors['fields'] = 'Vänligen fyll i alla fält.';
            break 1;
        }
    }
    
    if (empty($errors) === true) {
        if (user_exists($_POST['email']) === true) {
            $errors['email'] = 'E-posten \'' . $_POST['email'] . '\' är redan registrerad.'; 
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email2'] = 'Vänligen ange en korrekt e-post.';
        }
        if (strlen($_POST['password']) < 6) {
            $errors['pass1'] = 'Ditt lösenord måste vara minst 6 tecken långt.';
        }
        if ($_POST['password'] !== $_POST['password_again']) {
            $errors['pass2'] = 'Dina lösenord matchade inte.';
        }
    }
}

if (empty($_POST['regBtn']) === false && empty($errors) === true) {
    $register_data = array (
            'email'         => $_POST['email'],
            'first_name'    => $_POST['first_name'],
            'last_name'     => $_POST['last_name'],
            'password'      => $_POST['password'],
            'city'          => $_POST['city'],
    );
    register_user($register_data);
    $successMsg = '<h5> ✔ Registrering genomförd!</h5>';
} ?>

<form method="post" name="regForm" action="" id="regForm">
    <h2>Registrera dig här</h2>
    <?php if($successMsg) {
        echo $successMsg;
    }
          form_errors($errors['fields']); ?>
    <ul>
        <li>
            <input type="text" name="email" placeholder="E-post"> 
            <?php form_errors($errors['email']);
                  form_errors($errors['email2']); ?>
        </li>
        <li>
            <input type="text" name="first_name" placeholder="Förnamn"> 
        </li>
        <li>
            <input type="text" name="last_name" placeholder="Efternamn"> 
        </li>
        <li>
            <input type="password" name="password" placeholder="Lösenord">
            <?php form_errors($errors['pass1']); ?>
        </li>
        <li>
            <input type="password" name="password_again" placeholder="Upprepa lösenord">
            <?php form_errors($errors['pass2']); ?>
        </li>
        <li>
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
        </li>
        <li>
            <input type="submit" class="btn" name="regBtn" value="Skapa konto">
        </li>
    </ul>
</form>