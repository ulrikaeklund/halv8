<?php
include 'core/init.php';
include 'includes/overall/header.php';?>

<div id="editProfile">
    <form method="post" id="editForm" action="">
        <h2 id="editH">Redigera din profil</h2>
        <div class="edit">
            <input type="text" placeholder="E-mail">
            <input type="password" placeholder="Lösenord">
            <input type="password" placeholder="Upprepa lösenordet">
            <input type="text" placeholder="Förnamn">
            <input type="text" placeholder="Efternamn">
            <select name="city">
                <option selected="true" style="display:none;" value="Ändra stad">Ändra stad</option>
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
            <textarea id="#aboutText" placeholder="Berätta om dig själv"></textarea>
            <input type="text" placeholder="Skriv dina allergier här">
            <input type="text" placeholder="Facebookprofil URL">
            <input type="submit" class="btn" name="registerBtn" value="Spara din profil">
        </div>
    </form>
</div>


