<?php
$output = '';
if(isset($_POST['search'])){
    $searchq = $_POST['search'];
    
    $query = mysql_query("SELECT * FROM users WHERE first_name LIKE '%".$searchq."%' OR last_name LIKE '%".$searchq."%'") or die("Kunde inte söka");
    
    if (trim($_POST['search']) == ''){
        $output = 'Ingen anvädnare hittad!';
    }
    else{
        if(mysql_num_rows($query) > 0){
            while($row = mysql_fetch_array($query)){
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
      
                $output .= '<div>'.$first_name.' '.$last_name.  '</div>';
                }
        } 
    }
}
?>

<div id="searchFunc">
    <form action="search.php" method="post">
        <input type="text" name="search" placeholder="Sök efter användare...">
        <input type="submit" value="SÖK &#128270;" class="btn">
    </form>
    <?php print("$output"); ?>
</div>


