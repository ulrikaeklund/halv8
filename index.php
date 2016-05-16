<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<div id="omOss">
    <h2>Om oss </h2>
    <p> Inspirerade av TV4s matlagningsprogram “Halv åtta hos mig” är vår ambition att koppla ihop människor som bor i samma kommun att bjuda över varandra och äta middag hemma hos dem. En bjudningsgrupp bildas av fyra deltagare som var och en är ansvarig för att bjuda över de andra deltagarna på middag en dag. </p>
</div>

<form method="post" id="regForm" name="regForm" action="">
    <h2>Registrera dig här</h2>
    <input type="text" name="email" placeholder="E-mail">           
    <input type="password" name="password" placeholder="Lösenord">
    <input type="password" name="password_again" placeholder="Upprepa lösenord">
    <select>
        <option selected="true" style="display:none;">Välj stad</option>
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
    <button type="submit" class="btn" name="regBtn">Skapa konto</button>
</form>
<?php include 'includes/overall/footer.php'?>   