<?php
function set_comments($user_id, $comment, $commentPicture, $bjudning_id) {
    $time = date("G:i d/m/Y");
    sanitize($comment); sanitize($commentPicture); sanitize(user_id); sanitize(date);    
    mysql_query("INSERT INTO comments (user_id, text, date, picture, bjudning_id) VALUES ('$user_id', '$comment', '$time', '$commentPicture', $bjudning_id)");
}

function set_reply($user_id, $comment) {
    $time = date("G:i d/m/Y");
    $id = $_GET['reply_id'];
    mysql_query("INSERT INTO comments (user_id, text, date, reply_id) VALUES ('$user_id', '$comment', '$time', '$id')");
}

function get_comments($bjudning_id) {
    $result = mysql_query("SELECT * FROM comments WHERE reply_id=0 AND bjudning_id=$bjudning_id ORDER BY comment_id DESC");
    while ($row = mysql_fetch_assoc($result)) {
        $user_data = user_data($row['user_id'], 'first_name', 'last_name', 'profile');
        //Display comments
        echo '<div class="comment_box">
              <img src="' . $user_data['profile'] . '"class="comment_profilePicture alt="' . $user_data['first_name'] . 's profilbild">
              <p class="comment_name">' . $user_data['first_name'] . ' ' . $user_data['last_name'] . '</p>
              <p class="comment_time">' . $row['date'] . '</p>
              <p class="comment_text">' . $row['text'] . '</p>
              </div>';
        
        //Display replies
        $comment_id = $row['comment_id']; 
        get_replies($comment_id); 
        
        //Reply form 
        echo ' <form action="wall.php?reply_id=' . $row['comment_id'] . '"method="post" class="reply_form">
                   <img src="' . $user_data['profile'] . '"class="comment_profilePicture alt="' . $user_data['first_name'] . 's profilbild">
                   <textarea class="comment_reply" name="comment" placeholder="Skriv ett svar..."></textarea>
                   <img src="img/reply.png" class="reply_icon" onclick="document.getElementById(\'submitReply\').click();" title="Svara">
                   <input type="submit" name="replyBtn" style="display: none;" id="submitReply">
               </form>';
}   }

function get_replies($comment_id) {
    $result = mysql_query("SELECT * FROM comments WHERE reply_id='$comment_id'");
    if(mysql_num_rows($result) > 0) {
        echo '<div class="replies">';   
        while ($row = mysql_fetch_assoc($result)) {
            $user_id = $row['user_id'];
            $user_data = user_data($user_id, 'first_name', 'last_name', 'profile');
            echo '<div class="reply_box">
                  <img src="' . $user_data['profile'] . '"class="comment_profilePicture alt="' . $user_data['first_name'] . 's profilbild">
                  <p class="reply_time">' . $row['date'] . '</p>
                  <p id="reply_text"><span>' . $user_data['first_name'] . ' ' . $user_data['last_name'] . ':</span> ' . $row['text'] . '</p>    
                  </div>';
        }
        echo '</div>';   
}   }

?>