<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

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
<!--                <?php  ?> Här kommer php-fuktionaliteten med att displaya kommentarena -->
                
            </div>
        </div>

<?php include 'includes/overall/footer.php';?>