<?php
include 'core/init.php';
include 'includes/overall/header.php';

<<<<<<< HEAD
if(empty($_POST['commentBtn']) === false) {
    if(empty($_POST['comment'])) {
        $errors[] = 'Tomt meddelande';
    } else {
        set_comments($user_data['user_id'], $_POST['comment'], $_POST['commentPicture']);
    }
}
?>
=======
<div class="postwall">
            <div class="postrow">
                <form id="postForm" method="post" action="">
                    <h2>Gör ett inlägg i din bjudning</h2>
                    <textarea placeholder="Vad tänker du på?"></textarea>
                    <img src="img/fotocamera.png" id="camera"><input type="file" name="photo">
                    <input type="submit" class="btn" name="postBtn" value="Skicka">
                </form>
            </div>
            <div class="feed">
                <h2>Postade inlägg</h2>
                <div class="comments">
                    <img src="img/bror.jpg" id="commentpic">
                     <div class="comment-content">
                         <h6>Bror Bugge har gjort ett inlägg - postat för 5 minuter sen</h6>
				        <p>Ut nec interdum libero. Sed felis lorem, venenatis sed malesuada vitae, tempor vel turpis. Mauris in dui velit, vitae mollis risus. Cras lacinia lorem sit amet augue mattis vel cursus enim laoreet. Vestibulum faucibus scelerisque nisi vel sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pellentesque massa ac justo tempor eu pretium massa accumsan. In pharetra mattis mi et ultricies. Nunc vel eleifend augue. Donec venenatis egestas iaculis.</p>
				  </div>
                    <form method="post" action="" id="reply">
                        <img src="img/bror.jpg" id="replypic">
                        <textarea placeholder="Svara på inlägget" id="replytext"></textarea>
                        <input type="submit" class="btn" name="replyBtn" value="Svara">
                    </form>
 <!--               <?php 
//                    echo '<img src="', $user_data['profile'],'" alt="', $user_data['first_name'] ,'s profilbild">';
                    ?> Här kommer php-fuktionaliteten med att displaya kommentarena -->               
                </div>
            </div>
        </div>
>>>>>>> origin/master

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