<?php
include 'core/init.php';
include 'includes/overall/header.php';

$user_id= $user_data['user_id'];
$admin = mysql_result(mysql_query("SELECT admin FROM users WHERE user_id = '$user_id'"), 0);
if ($admin == 0) {
     echo '<script type="text/javascript">window.location = "index.php"</script>'; 
     exit();
}

if(empty($_POST['raderaBtn']) === false) {
    $comment_id = $_GET['comment_id'];
    mysql_query("DELETE FROM comments WHERE comment_id='$comment_id'");
}
?>
<div class="column">
            <section id="content">
                <div id="box1">
                    <h3>Antal användare</h3>
                    <?php $result=mysql_query("SELECT count(*) as total from users");
                    $data=mysql_fetch_assoc($result);
                    echo '<h1>' . $data['total'] . '</h1>'; ?>
                </div>
                <a href="admin_user.php"><button class="btn" id="toUsers" action="admin_user.php">Redigera användare</button></a>
            </section>
            <section id="middle">
                <section class="bjudningstable">
                    <h2>10 senaste bjudningarna</h2>  
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
	   </section>
	   <aside id="sidebar">
           <section class="commentstable">
               <h2>Kommentarer</h2>  
               <div  class="tbl-header">
                   <table cellpadding="0" cellspacing="0" border="0">
                    <col width="20%">
                    <col width="30%">
                    <col width="50%">
                    <thead>
                        <tr>
                          <th>User-ID</th>
                          <th>Comment</th>
                        </tr>
                    </thead>
                   </table>
               </div>
               <div  class="tbl-content">
                   <table cellpadding="0" cellspacing="0" border="0">
                    <col width="20%">
                    <col width="70%">
                    <col width="10%">
                    <tbody>
                      <?php $result = mysql_query("SELECT * FROM comments");
                              while ($row = mysql_fetch_assoc($result)) {
                                  echo '<tr><th>' . $row['user_id'] . '</th>
                                        <th>' . $row['text'] . '</th>
                                        <th><form action="admin.php?comment_id=' . $row['comment_id'] . '" method="post">
                                              <input type="submit" class="btn" value="&#10060;" name="raderaBtn" id="raderaBtn">
                                            </form>
                                        </th></tr>';
                              }?>   
                    </tbody>
                   </table>
               </div>
            </section>
            </aside>
        </div>

<?php include 'includes/overall/footer.php'?>