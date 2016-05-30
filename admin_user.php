<?php
include 'core/init.php';
include 'includes/overall/header.php';

$user_id= $user_data['user_id'];
$admin = mysql_result(mysql_query("SELECT admin FROM users WHERE user_id = '$user_id'"), 0);
if ($admin == 0) {
     echo '<script type="text/javascript">window.location = "index.php"</script>'; 
     exit();
}

if(empty($_POST['bannBtn']) === false) {
    $user_id = $_GET['user_id'];
    mysql_query("DELETE FROM users WHERE user_id='$user_id'");
} else if(empty($_POST['adminBtn']) === false) {
    $user_id = $_GET['user_id'];
    mysql_query("UPDATE users SET admin=1 WHERE user_id = $user_id");
}
?>
<section class="tbl"> 
<h1>Användare</h1>  
<div  class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
      <col width="10%">
      <col width="30%">
      <col width="30%">
      <col width="10%">
      <col width="10%">
      <col width="10%">
      <tr><th>USER_ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>BJUDNING_ID</th>
            <th>BANN</th>
            <th>ADMIN</th></tr>     
      <tbody>      
      <?php $result = mysql_query("SELECT * FROM users");
            while ($row = mysql_fetch_assoc($result)) {
                  echo '<tr><th>' . $row['user_id'] . '</th>
                        <th>' . $row['first_name'] . ' ' . $row['last_name'] . '</th>
                        <th>' . $row['email'] . '</th>
                        <th>' . $row['bjudning_id'] . '</th>
                        <th><form action="admin_user.php?user_id=' . $row['user_id'] . '" method="post">
                              <input type="submit" class="btn" value="&#10060;" name="bannBtn">
                              <input type="submit" class="btn" value="✓" name="adminBtn" id="adminBtn">
                              </form>
                        </th></tr>';
            }?>   
      </tbody>
      </table>
 
</div>
</section>
<?php include 'includes/overall/footer.php'?>