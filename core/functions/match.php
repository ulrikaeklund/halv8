<?php
function accept_bjudning($user_id) {
    $user_data = user_data($user_id, 'user_id', 'first_name', 'last_name', 'email', 'password', 'city', 'dagar', 'searching', 'profile', 'bjudning_id');
    $bjudning_id = $user_data['bjudning_id'];
    $result = mysql_query("SELECT * FROM users WHERE bjudning_id = $bjudning_id AND accept=1");
    $users_accepted = mysql_num_rows($result);
    
    if($users_accepted == 4) {
        mysql_query("UPDATE bjudning SET aktiv='1' WHERE bjudning_id = $bjudning_id"); 
    }
}

function get_match($user_id) {
    $user_data = user_data($user_id, 'user_id', 'first_name', 'last_name', 'email', 'password', 'city', 'dagar', 'searching', 'profile', 'bjudning_id');
    $city = $user_data['city'];
    $dagar = explode(' ', $user_data['dagar']);
    
    $result = mysql_query("SELECT * FROM users WHERE city = '$city' AND searching = 1 AND user_id != $user_id");
    foreach($dagar as $dag) {
        unset($match_ids);
        $match_ids = array();
        $match_ids[] = $user_id;
        while ($row = mysql_fetch_assoc($result)) {
            $match_dagar = explode(' ', $row['dagar']);
            foreach($match_dagar as $match_dag) { 
                if($dag == $match_dag) {
                    $match_ids[] = $row['user_id'];
                }
            }
        }
        if (count($match_ids) >= 4) {
            break 1;
        }
    }

    //Match found!
    if (count($match_ids) >= 4) {
        mysql_query("INSERT INTO bjudning (aktiv, dag) VALUES (0, '$dag')") or die (mysql_error());
        $bjudning_id = mysql_insert_id();
        foreach($match_ids as $user_id) {
            mysql_query("UPDATE users SET dagar='', searching=0, bjudning_id=$bjudning_id, accept=0 WHERE user_id = $user_id"); 
        }
    }
}

?>
