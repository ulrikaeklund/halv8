
<?php 
include 'core/init.php';
include 'includes/overall/header.php';
	  if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
	  $name=$_POST['name']; 
	  //-query  the database table 
	  $sql="SELECT  user_id, first_name, last_name FROM Contacts WHERE first_name LIKE '%" . $name .  "%' OR last_name LIKE '%" . $name ."%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysql_query($sql); 
	  while($row=mysql_fetch_array($result)){ 
	          $first_name  =$row['first_name']; 
	          $LastName=$row['last_name']; 
	          $ID=$row['user_id']; 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$first_name . " " . $last_name .  "</a></li>\n"; 
	  echo "</ul>"; 
	  } 
	  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  } 
	  } 
	?> 

	<html> 
3	  <head> 
4	    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
5	    <title>Search  Contacts</title> 
6	  </head> 
7	  <p><body> 
8	    <h3>Search  Contacts Details</h3> 
9	    <p>You  may search either by first or last name</p> 
10	    <form  method="post" action="search.php?go"  id="searchform"> 
11	      <input  type="text" name="name"> 
12	      <input  type="submit" name="submit" value="Search"> 
13	    </form> 
14	  </body> 
15	</html> 
16	</p> 