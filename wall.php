<?php
include 'core/init.php';
include 'includes/overall/header.php';

if(empty($_POST['commentBtn']) === false) {
    if(empty($_POST['comment'])) {
        echo '<script>window.alert("Skriv något")</script>';
    } else {
        set_comments($user_data['user_id'], $_POST['comment'], $_POST['commentPicture']);
        echo '<script type="text/javascript">window.location = "wall.php"</script>'; 
    }
}

if(empty($_POST['replyBtn']) === false) {
    if(empty($_POST['comment'])) {
        echo '<script>window.alert("Skriv något")</script>';
    } else {
        $user_id = $user_data['user_id'];
        set_reply($user_id, $_POST['comment']);
         echo '<script type="text/javascript">
                window.location = "wall.php"
              </script>'; 
    }
}?>

<div id="wall">
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
<?php
    get_comments();
?>
</div>
<?php include 'includes/overall/footer.php';?>