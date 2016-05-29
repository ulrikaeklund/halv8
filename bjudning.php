<?php
include 'core/init.php';
include 'includes/overall/header.php';

if ($user_data['sociala_regler'] == false) {
    echo '<script type="text/javascript">window.location = "social.php"</script>'; 
    exit(); 
}

//i en aktiv bjudning
$bjudning_id = $user_data['bjudning_id'];
$active = mysql_result(mysql_query("SELECT aktiv FROM bjudning WHERE bjudning_id = '$bjudning_id'"), 0);
if ($bjudning_id != 0 && $active == 1) {
     echo '<script type="text/javascript">window.location = "wall.php"</script>'; 
     exit();

//acceptera bjudning
} else if($bjudning_id != 0) {
    if(isset($_POST['acceptBtn'])){
        $user_id = $user_data['user_id'];
        mysql_query("UPDATE users SET accept = true WHERE user_id = $user_id");
        accept_bjudning($user_id);
        echo '<script type="text/javascript">window.location = "bjudning.php"</script>';
        exit();
    }?>
    
    <div id="bjudningAccept">
        <h2>Du har blivit placerad i en bjudning!</h2>
        <?php $result = mysql_query("SELECT * FROM users WHERE bjudning_id = $bjudning_id");
        echo '<ul>';
        while ($row = mysql_fetch_assoc($result)) {
            echo '<li>
                   <img src="' . $row['profile'] . '"class="accept_profilePicture alt="' . $row['first_name'] . 's profilbild">';
            if($row['accept'] == 1) {
                echo '<p>✔ ' . $row['first_name'] . ' ' . $row['last_name'] . '</p></li>';
            } else {
                echo '<p>' . $row['first_name'] . ' ' . $row['last_name'] . '</p></li>';
            }   
        }
        echo '</ul>';
        ?>
        
         <?php if($user_data['accept'] == false) {
             echo '<form method="post">
                       <input type="submit" name="acceptBtn" value="ACCEPTERA" class="btn">
                   </form>';
         } else {
             echo '<h3>Väntar på att alla gäster ska acceptera...</h3>';
         } ?>
       </div><?php
} else {
    
    //sök en bjudning
    if(empty($_POST['searchBtn']) === false) {
        if(empty($_POST['monday']) && empty($_POST['tuesday']) && empty($_POST['wednessday']) && empty($_POST['thursday']) && empty($_POST['friday']) && empty($_POST['saturday']) && empty($_POST['sunday'])) {
            echo '<script>window.alert("Du måste vara tillgänglig åtminstone en dag")</script>';
        } else {
            $user_id = $user_data['user_id'];
            mysql_query("UPDATE users SET searching = true WHERE user_id = $user_id");
            
            //Sökdagar
            $dagar = 'monday tuesday wednessday thursday friday saturday sunday';
            $dagar = explode(' ', $dagar);
            for($i = 0; $i <= 7; $i++) {
                if(isset($_POST[$dagar[$i]])) {
                    $searchDays[] = $dagar[$i];
                }
            } 
            $dagar = implode(' ', $searchDays);
            mysql_query("UPDATE users SET dagar = '$dagar' WHERE user_id = $user_id"); 
            get_match($user_id);
            echo '<script type="text/javascript">window.location = "bjudning.php"</script>';
            exit();
    }   }?>
    
    <div class="searchBjud">
        <form method="post" id="searchForm" action="">
            <h2>Sök ny bjudning</h2>
            <div class="items">
                <input name="monday" id="monday" type="checkbox">
                <label for="monday">Måndag</label>

                <input name="tuesday" id="tuesday" type="checkbox">
                <label for="tuesday">Tisdag</label>

                <input name="wednessday" id="wednesday" type="checkbox">
                <label for="wednesday">Onsdag</label>

                <input name="thursday" id="thursday" type="checkbox">
                <label for="thursday">Torsdag</label>

                <input name="friday" id="friday" type="checkbox">
                <label for="friday">Fredag</label>

                <input name="saturday" id="saturday" type="checkbox">
                <label for="saturday">Lördag</label>
                
                <input name="sunday" id="sunday" type="checkbox">
                <label for="sunday">Söndag</label>

                <h3 class="done" aria-hidden="true">Tillgänglig</h3>
                <h3 class="undone" aria-hidden="true">Inte tillgänglig</h3>
            </div>
            <input type="submit" class="btn" name="searchBtn" value="SÖK &#128270;">
        </form>
    </div>
<?php }

include 'includes/overall/footer.php';?>