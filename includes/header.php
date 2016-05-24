<header>
    <a href="index.php"><img id="logga" src="img/logga8.png" alt="Halv 8 hos mig"></a>
    <nav>
        <?php if(logged_in()) {
        echo    '<ul>
                    <li><a class="btn" href="bjudning.php">BJUDNING</a></li>
                    <li><a class="btn" href="profil.php">PROFIL</a></li>
                    <li><a class="btn" href="faq.php">FRÅGOR</a></li>
                    <li><a class="btn" href="logout.php">LOGGA UT</a></li>
                </ul>'; 
        } else { 
            echo '<form method="post" id="loginForm" action=""> 
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Lösenord">
                    <input type="submit" class="btn" name="loginBtn" value="Logga in">
                </form>';
        }?>
    </nav>
</header>