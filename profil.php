<?php
include 'core/init.php';
include 'includes/overall/header.php';

?>

<div id="profilContent">
    <div class="avatar">
        <img src="img/profile/defaultprofile.png" alt="Default profilbild">
        <?php 
        if(isset ($_FILES['profile']) === true){
            if(empty($_FILES['profile']['name']) === true){
                echo 'Vänligen välj ett foto!';
            }
            else{
                $allowed = array('jpg', 'jpeg', 'gif', 'png');
                
                $file_name = $_FILES['profile']['name'];
                $file_extn = strtolower(end(explode('.', $file_name)));
                $file_temp = $_FILES['profile']['tmp_name'];
                
                if(in_array($file_extn, $allowed) === true){
                    change_profile_image($session_user_id, $file_temp, $file_extn);
                    header('Location: profil.php');
                    exit();
                }
                else{
                    echo 'Du har använt dig av felaktigt format.';
                    echo implode(', ',$allowed);
                }   
            }
        }
        if(empty($user_data['profile']) === false){
            echo '<img src="', $user_data['profile'],'" alt="', $user_data['first_name'] ,'s profilbild">';
        } ?>
    </div>
    <div id="profil">
        <form action="" method="post" enctype="multipart/form-data" id="avatarPhoto">
            <input type="file" name="profile">
            <input type="submit" class="btn" name="foto_btn" value="Uppdatera din profilbild">
        </form>
    </div>
    <h2>Bror Bugge</h2>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna ip sum dolore. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna ip sum dolore.</p>
    <form method="post" id="editprof" action="register_profile.php">
        <input type="submit" class="btn" name="redi_btn" value="Redigera din profil">
    </form>
</div>
<?php include 'includes/overall/footer.php'?>