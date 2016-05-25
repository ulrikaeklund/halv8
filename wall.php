<?php
include 'core/init.php';
include 'includes/overall/header.php';

if(empty($_POST['commentBtn']) === false) {
    if(empty($_POST['comment'])) {
        $errors[] = 'Tomt meddelande';
    } else {
        set_comments($user_data['user_id'], $_POST['comment'], $_POST['commentPicture']);
    }
}
?>

<div id="wall">
    <h1>Min bjudning</h1><br><br>
    <form id="postForm" method="post" action="">
        <ul>
            <li>
                <input name="commentPicture" type="file" id="selectedFile" style="display: none;" />
                <img src="img/fotocamera.png" class="uploadPicture" onclick="document.getElementById('selectedFile').click();" title="Ladda upp en bild">
            </li>
            <hr>
            <li>
                <textarea name="comment" placeholder="Vad tänker du på?"></textarea>
            </li>
            <hr>
            <li>
                <input type="submit" class="btn" name="commentBtn" value="Skicka">
            </li>
        </ul>     
    </form>
    
<?php
    get_comments();
?>
</div>
<?php include 'includes/overall/footer.php';?>