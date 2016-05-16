<header>
    <img id="logga" src="img/logo.png">
    <nav>
        <?php if(!logged_in()) {
        echo    '<form method="post" id="loginForm" action=""> 
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Lösenord">
                    <button type="submit" class="btn" name="loginBtn">Logga in</button>
                </form>';
        } else {
        echo    '<ul>
                    <li><a class="btn" href="bjudning.php">BJUDNING</a></li>
                    <li><a class="btn" href="profil.php">PROFIL</a></li>
                    <li><a class="btn" href="faq.php">FRÅGOR</a></li>
                    <li><a class="btn" href="test">LOGGA UT</a></li>
                </ul>'; 
        } ?>
    </nav>
</header>