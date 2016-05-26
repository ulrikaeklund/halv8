<?php
include 'core/init.php';
include 'includes/overall/header.php';

if ($user_data['bjudning_id'] != 0) {
     echo '<script type="text/javascript">window.location = "wall.php"</script>'; 
     exit();
}

if(empty($_POST['searchBtn']) === false) {
    if(empty($_POST['check_list'])) {
        echo '<script>window.alert("Du måste vara tillgänglig åtminstone en dag")</script>';
    } else {
        $user_id = $user_data['user_id'];
        mysql_query("UPDATE users SET searching = true WHERE user_id = $user_id");
        $dagar = implode(', ', $_POST['check_list']);
        echo $dagar;
    }
}
?>

<div class="searchBjud">
    <form method="post" id="searchForm" action="">
        <h2>Sök ny bjudning</h2>
        <div class="items">
            <input name="check_list[]" id="monday" type="checkbox" valye="monday">
            <label for="monday">Måndag</label>

            <input name="check_list[]" id="tuesday" type="checkbox">
            <label for="tuesday">Tisdag</label>

            <input name="check_list[]" id="wednesday" type="checkbox">
            <label for="wednesday">Onsdag</label>

            <input name="check_list[]" id="thursday" type="checkbox">
            <label for="thursday">Torsdag</label>

            <input name="check_list[]" id="friday" type="checkbox">
            <label for="friday">Fredag</label>

            <input name="check_list[]" id="saturday" type="checkbox">
            <label for="saturday">Lördag</label>
            
            <input name="check_list[]" id="sunday" type="checkbox">
            <label for="sunday">Söndag</label>

            <h3 class="done" aria-hidden="true">Tillgänglig</h3>
            <h3 class="undone" aria-hidden="true">Inte tillgänglig</h3>
          </div>
        <input type="submit" class="btn" name="searchBtn" value="SÖK &#128270;">
    </form>
</div>
<?php include 'includes/overall/footer.php';?>