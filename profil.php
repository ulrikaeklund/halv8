<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

<div id="profilContent">
    <div class="avatar">
        <?php 
        if(empty($user_data['profile']) === true){
            echo '<img src="img/pictures/defaultprofile.png" alt="Default profilbild" id="default">';
        }
         ?>
    </div>
    <div id="profil">
        <form action="" method="post" enctype="multipart/form-data" id="avatarPhoto">
            <input name="profile" type="file" id="profile" style="display: none;">
            <img src="img/fotocamera.png" class="uploadPicture" onclick="document.getElementById('profile').click();" title="Välj en profilbild">
            <script>document.getElementById('file').onchange = window.alert("sometext"); </script>
<!--            <input type="file" name="profile">-->
<!--            <input type="submit" class="btn" id="foto_btn" value="Uppdatera din profilbild">-->
        </form>
    </div>
    <h2>Bror Bugge</h2>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna ip sum dolore. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna ip sum dolore.</p>
    <form method="post" id="editprof" action="register_profile.php">
        <input type="submit" class="btn" name="redi_btn" value="Redigera din profil">
    </form>
</div>
<?php include 'includes/overall/footer.php'?>