<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<section class="tbl"> 
<h1>Användare</h1>  
<div  class="tbl-header">

      <?php
//        $query = "SELECT * FROM users"; 
//        $result = mysql_query($query);
//
//    echo "<table cellpadding="0" cellspacing="0" border="0">
//          <thead>
//            <tr>
//              <th>User_ID</th>
//              <th>Email</th>
//              <th>First_name</th>
//              <th>Last_name</th>
//              <th>City</th>
//              <th>Söker</th>
//              <th>Bjudning_ID</th>
//              <th>Profile</th>
//              <th>Om</th>
//              <th>Facebook-URL</th>
//              <th>Allergier</th>
//              <th>Dagar</th>
//              <th>Rating</th>
//              <th>Senast_bjudna</th>
//            </tr>
//          </thead>
//        </table>
//        </div>
//        <div  class='tbl-content'>
//        <table cellpadding="0" cellspacing="0" border="0">
//          <tbody>"; 
//
//    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
//    echo "<tr><td>" . $row['user_id'] . "</td><td>" . $row['email'] . "</td></tr>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td></tr>" . $row['city'] . "</td><td>" . $row['söker'] . "</td></tr>" . $row['bjudning_id'] . "</td><td>" . $row['profile'] . "</td></tr>" . $row['om'] . "</td><td>" . $row['facebook-url'] . "</td></tr>" . $row['allergier'] . "</td><td>" . $row['dagar'] . "</td></tr>" . $row['rating'] . "</td><td>" . $row['senast_bjudna'] . "</td></tr>";
//    }
//
//    echo "</tbody>
//            </table>";
?>
    
</div>
</section>
<?php include 'includes/overall/footer.php'?>