<header>

    <img id="logga" src="../img/logga8.png">
<!--    <h1>Halv åtta hos mig</h1>
-->
    <nav>
        <?php if(logged_in()) {
        echo    '<ul>
                    <li><a class="btn" href="bjudning.php">BJUDNING</a></li>
                    <li><a class="btn" href="profil.php">PROFIL</a></li>
                    <li><a class="btn" href="faq.php">FRÅGOR</a></li>
                    <li><a class="btn" href="logout.php">LOGGA UT</a></li>
                </ul>'; 
        } ?>
    </nav>
</header>