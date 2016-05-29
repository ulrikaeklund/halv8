<?php
include 'core/init.php';
include 'includes/overall/header.php';

$user_id = $user_data['user_id'];
if (empty($_POST['socialBtn']) === false) {
    mysql_query("UPDATE users SET sociala_regler='1' WHERE user_id = $user_id");
    echo '<script type="text/javascript">window.location = "bjudning.php"</script>';
}
?>
<div id="social">
    <h2>Sociala Regler för Halv åtta hos mig</h2>
    <h3>Allmänt</h3>
    <p>Bjudningsdeltagare förbinder sig att genomföra de bjudningar de anmäler sig till med godtagbar kvalité. Vad som menas med godtagbar kvalité avgörs av bjudningens gäster där ett snittbetyg på minst 3/10 måste erhållas i samband med bjudning. Vid bristfälliga omdömen, otrevligt uppförande, utebliven närvaro eller annat negativt beteende kan användaren stängas av från sidan. Alla bjudningsdeltagare måste vara minst 18 år gamla.</p>
    <h3>Trivselregler</h3>
    <p>God ton och trevligt uppförande är en självklarhet för en trevlig middagsbjudning. Därför är det inte tillåtet att använda webbsidans funktionalitet för att: </p>
    <ul id="trivsel">
        <li>Skicka spammejl eller andra oönskade meddelanden.</li>
        <li>Trakassera, hota eller på något sätt agera anstötligt mot en annan användare.</li>
        <li>Planera någon olaglig eller olämplig aktivitet.</li>
        <li>Ge utlopp för sina rasistiska tankar.</li>
    </ul>
    <h3>Ansvar</h3>
    <p>Halvåttahosmig garanterar inte oavbruten och säker tillgång till sin webbsida och tjänst. Driften av webbsidan och tjänsten kan påverkas av faktorer utanför Halvåttahosmigs kontroll. Detta medför att halvåttahosmig inte kan garantera att hemsidan är funktionell och tillgänglig dygnet runt.</p>
    <h3>Användargenererat innehåll</h3>
    <p>Med användargenererat innehåll avses allt innehåll som skapas och/eller laddas upp  på Halvåttahosmigs webbsida.</p>
    <p>När en bjudningsdeltagare laddar upp någon form av användargenererat innehåll ger de även Halvåttahosmig oinskränkt rätt att förfoga över detta innehåll(PUL 11 §). Denna förfoganderätt kvarstår även om innehållet har blivit raderat från webbsidan.</p>
    <p>Interaktion med andra bjudningsdeltagare.</p>
    <p>När en bjudningsdeltagare brukar halvåttahosmigs tjänst för att träffa andra individer, så gör de det i med full förståelse för att de själva bär fullt ansvar för sin interaktion. Bjudningsdeltagaren förstår även att Halvåttahosmig inte genomför några bakgrundskontroller på sina bjudningsdeltagare och att den information som är bifogad på sidan inte nödvändigtvis behöver vara sanningsenlig.</p>
    <form method="POST">
        <input type="submit" class="btn" value="ACCEPTERA" name="socialBtn" id="socialBtn">
    </form>
</div>

<?php include 'includes/overall/footer.php'?>