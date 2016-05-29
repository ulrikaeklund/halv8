<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>

<div id="profilContent">
    <div class="avatar">
        <?php
        if(isset($_FILES['profile']) === true){
            if(empty($_FILES['profile']['name']) === true){
                echo 'Vänligen välj en fil!';
            }
            else{
                $allowed = array('jpg', 'jpeg', 'gif', 'png');
                
                $file_name = $_FILES['profile']['name'];
                $file_name = explode('.', $file_name);
                $file_extn = strtolower(end($file_name));
                $file_temp = $_FILES['profile']['tmp_name'];
                
                if(in_array($file_extn, $allowed) === true){
                    change_profile_image($session_user_id, $file_temp, $file_extn);
                    $file_temp = array();
                    header('Location: profil.php');
                    exit();
                }
                else{
                    echo 'Felaktig filtyp. Tillåtna filtyper: ';
                    echo implode(', ', $allowed);
                }
            }
        }
        
        if(empty($user_data['profile']) === false){
            echo '<img src="', $user_data['profile'], '" alt="', $user_data['first_name'], ' \'s profilbild" id="profilbild">';   
        }
        ?>
    </div>
    <div id="profil">
        <form action="" method="post" enctype="multipart/form-data" id="avatarPhoto">
<!--
            <label for="profile">
                <img src="img/fotocamera.png" class="uploadPicture" title="Välj en profilbild">
style="display: none;
            </label>
-->
            <input name="profile" type="file" id="profile">
            <input type="submit" class="btn" value="Välj bild">
            
        </form>
    </div>
    <?php 
    echo '<h2>' . $user_data['first_name'] . ' ' . $user_data['last_name'] . '</h2>';
    echo '<p>' . $user_data['about'] .'</p>';
    ?>
    <form method="post" id="editprof" action="register_profile.php">
        <input type="submit" class="btn" name="redi_btn" value="Redigera profil">
    </form>
</div>
<?php include 'includes/overall/footer.php'; ?>