<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<div id="profilContent">
    <div class="avatar">
        <img id="profilbild" src="img/bror.jpg">
    </div>
    <h2>Bror Bugge</h2>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna ip sum dolore. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna ip sum dolore.</p>
    <form method="post" id="editprof" action="register_profile.php">
        <input type="submit" class="btn" name="redi_btn" value="Redigera din profil">
    </form>
</div>
<?php include 'includes/overall/footer.php'?>