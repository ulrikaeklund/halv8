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
            <script>    
                alert("Hello\nHow are you?");
                var fileToRead = document.getElementById("profile");
                fileToRead.addEventListener("change", function(event) {
                    
            }
            </script>
        </form>
    </div>
    <?php echo '<h2>' . $user_data['first_name'] . ' ' . $user_data['last_name'] . '</h2>';
    echo '<p>' . $user_data['about'] .'</p>';?>
    <form method="post" id="editprof" action="register_profile.php">
        <input type="submit" class="btn" name="redi_btn" value="Redigera profil">
    </form>
</div>
<?php include 'includes/overall/footer.php'?>