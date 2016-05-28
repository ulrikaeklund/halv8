<?php
include 'core/init.php';
$output = '';
if(isset($_POST['search'])){
  $searchq = $_POST['search'];

$query = mysql_qurey("SELECT * FROM users WHERE email LIKE '%$searchq%'") or die ("Kunde inte söka");
$count = mysql_num_rows($query);
if($count == 0){
  $output = 'Ingen anvädnare hittad!';
}
else{
  while($row = mysql_fetch_array($query)){
    $email = $row['email'];

    $output .= '<div>'.$email.'</div>';

    } 
  }
}
?>


<html>
<head>
<title>Search</title>
<body>
<form action="search.php" method="post">
<input type="text" name="search" placeholder="Sök här!"/>
<input type="submit" value=">>"/>
</form>
<?php print("");?>
</body>
</head>


</html>