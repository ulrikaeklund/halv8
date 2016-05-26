<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<div class="column">
            <section id="content">
                <div id="box1">
                    <h3>Antal användare</h3>
                    <h1>479</h1>
                </div>
                <div id="box2">
                    <h3>Antal aktiva användare</h3>
                    <h1>38</h1>
                </div>
                <a href="admin_user.php"><button class="btn" id="toUsers" action="admin_user.php">Redigera användare</button></a>
            </section>
            <section id="middle">
                <section class="bjudningstable">
                    <h2>10 nyaste bjudningarna</h2>  
                    <div  class="tbl-header">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                  <th>Bjud-ID</th>
                                  <th>Stad</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div  class="tbl-content">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Uppsala</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Gävle</td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Västerås</td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>Göteborg</td>
                                </tr>
                                <tr>
                                  <td>5</td>
                                  <td>Uppsala</td>
                                </tr>
                                <tr>
                                  <td>6</td>
                                  <td>Uppsala</td>
                                </tr>
                                <tr>
                                  <td>7</td>
                                  <td>Stockholm</td>
                                </tr>
                                <tr>
                                  <td>8</td>
                                  <td>Lund</td>
                                </tr>
                                <tr>
                                  <td>9</td>
                                  <td>Göteborg</td>
                                </tr>
                                <tr>
                                  <td>10</td>
                                  <td>Uppsala</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <a href="admin_bjud.php"><button class="btn" id="toBjud" action="admin_bjud.php">Redigera bjudningar</button></a>
	   </section>
	   <aside id="sidebar">
           <section class="commentstable">
               <h2>De 10 senaste kommentarerna</h2>  
               <div  class="tbl-header">
                   <table cellpadding="0" cellspacing="0" border="0">
                    <col width="20%">
                    <col width="30%">
                    <col width="50%">
                    <thead>
                        <tr>
                          <th>User-ID</th>
                          <th>E-mail</th>
                          <th>Comment</th>
                        </tr>
                    </thead>
                   </table>
               </div>
               <div  class="tbl-content">
                   <table cellpadding="0" cellspacing="0" border="0">
                    <col width="20%">
                    <col width="30%">
                    <col width="50%">
                    <tbody>
                        <tr>
                          <td>1</td>
                          <td>ulrika@hej.se</td>
                          <td>Spännande med första middagen ikväll. Hoppas det blir lyckat!</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>elias@hej.se</td>
                          <td>Vad blir det för meny ikväll? Massa med fisk hoppas jag!</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>fredrik@hej.se</td>
                          <td>Riktigt impad över att Elias hade en skärbräda av Per Moberg.</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>madde@hej.se</td>
                          <td>Riktigt trevligt gäng, hoppas vi ses igen!</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>lisa@hej.se</td>
                          <td>Trevlig kväll igår, tack!</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>sara@hej.se</td>
                          <td>Jag var riktigt nervös innan ni kom till min middag, men till slut tyckte jag att det var riktigt trevligt.</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>andreas@hej.se</td>
                          <td>Ni är grymt trevliga människor :)</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>filip@hej.se</td>
                          <td>Äntligen min tur att få fixa middag ikväll!</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>leo@hej.se</td>
                          <td>Stämningen fick bättre betyg än maten, trevligt ändå.</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>mattias@hej.se</td>
                          <td>Sjukt god mat på middagen igår, high praise till Sara.</td>
                        </tr>
                    </tbody>
                   </table>
               </div>
            </section>
           <a href="admin_comments.php"><button class="btn" id="toComments">Redigera kommentarer</button></a>
            </aside>
        </div>

<?php include 'includes/overall/footer.php'?>