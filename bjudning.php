<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

<div class="searchBjud">
    <form method="post" id="searchForm" action="">
        <h2>Sök ny bjudning</h2>
        <div class="items">
            <input id="monday" type="checkbox">
            <label for="monday">Måndag</label>

            <input id="tuesday" type="checkbox">
            <label for="tuesday">Tisdag</label>

            <input id="wednesday" type="checkbox">
            <label for="wednesday">Onsdag</label>

            <input id="thursday" type="checkbox">
            <label for="thursday">Torsdag</label>

            <input id="friday" type="checkbox">
            <label for="friday">Fredag</label>

            <input id="saturday" type="checkbox">
            <label for="saturday">Lördag</label>
            
            <input id="sunday" type="checkbox">
            <label for="sunday">Söndag</label>

            <h3 class="done" aria-hidden="true">Tillgänglig</h3>
            <h3 class="undone" aria-hidden="true">Inte tillgänglig</h3>
          </div>
        <input type="submit" class="btn" name="searchBtn" value="Sök bjudning">
    </form>
</div>
