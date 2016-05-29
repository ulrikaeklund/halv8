<?php
include 'core/init.php';
include 'includes/overall/header.php';

$bjudning_id = $user_data['bjudning_id'];
$active = mysql_result(mysql_query("SELECT aktiv FROM bjudning WHERE bjudning_id = '$bjudning_id'"), 0);
if ($bjudning_id == 0 || $active == 0) {
     echo '<script type="text/javascript">window.location = "bjudning.php"</script>'; 
     exit();
}

//Deltagare
$dag = mysql_result(mysql_query("SELECT dag FROM bjudning WHERE bjudning_id = '$bjudning_id'"), 0) or die (mysql_error());  
//Vet att det vore bättre att bara spara t.ex monday som måndag i databasen men det 
//krånglade då och säcken börjar knyta ihop sig nu så det får ordnas till releaseversionen ;-)
$day_transl = array();
$day_transl['monday'] = 'måndag'; $day_transl['tuesday'] = 'tisdag'; $day_transl['wednessday'] = 'onsdag'; $day_transl['thursday'] = 'torsdag'; $day_transl['friday'] = 'fredag'; $day_transl['saturday'] = 'lördag'; $day_transl['sunday'] = 'söndag'; 
$date = date(strtotime('last ' . $dag));   
$result = mysql_query("SELECT * FROM users WHERE bjudning_id = $bjudning_id");

echo '<div id="wall_bjudningar"><ul>';
while ($row = mysql_fetch_assoc($result)) {
    echo '<li>
          <img src="' . $row['profile'] . '"class="accept_profilePicture alt="' . $row['first_name'] . 's profilbild">
          <p class="wall_name">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>';
    $date = strtotime("+7 day", $date);
    echo  '<p class="wall_bjudningstid">Bjudningsdag: ' . $day_transl[$dag] . ' (' . date('d/m/Y', $date) . ')</p></li>';
}   
echo '</ul></div>';

//Comments
if(empty($_POST['commentBtn']) === false) {
    if(empty($_POST['comment'])) {
        echo '<script>window.alert("Skriv något")</script>';
    } else {
        set_comments($user_data['user_id'], $_POST['comment'], $_POST['commentPicture'], $bjudning_id);
        echo '<script type="text/javascript">window.location = "wall.php"</script>'; 
    }
}

//Replies
if(empty($_POST['replyBtn']) === false) {
    if(empty($_POST['comment'])) {
        echo '<script>window.alert("Skriv något")</script>';
    } else {
        $user_id = $user_data['user_id'];
        set_reply($user_id, $_POST['comment']);
         echo '<script type="text/javascript">window.location = "wall.php"</script>'; 
    }
}?>

<div id="wall">
    <!-- Comment form -->
    <div id="comment">
    <form id="postForm" method="post" action="">
        <input name="commentPicture" type="file" id="selectedFile" style="display: none;" />
        <hr id="hr_up">
        <img src="img/fotocamera.png" class="uploadPicture" onclick="document.getElementById('selectedFile').click();" title="Ladda upp en bild">
        <?php echo '<img src="' . $user_data['profile'] . '"class="comment_profilePicture alt="' . $user_data['first_name'] . 's profilbild">'; ?>
        <textarea name="comment" placeholder="Vad tänker du på?"></textarea>
        <hr id="hr_down">
        <input type="submit" class="btn" name="commentBtn" value="SKICKA">    
    </form>
    </div>

<?php get_comments($bjudning_id);?>
</div> 
<?php include 'includes/overall/footer.php';?>