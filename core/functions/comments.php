<?php
function set_comments($user_id, $comment, $commentPicture) {
    $time = date("G:i d/m/Y");
    sanitize($comment); sanitize($commentPicture); sanitize(user_id); sanitize(date);    
    mysql_query("INSERT INTO comments (user_id, text, date, picture) VALUES ('$user_id', '$comment', '$time', '$commentPicture')");
}

function set_reply($comment) {
    $time = date("G:i d/m/Y");
    mysql_query("INSERT INTO posts (message, comment_time, reply) VALUES ('$comment', '$time', 1)");
}

function get_comments() {
    $result = mysql_query("SELECT * FROM comments WHERE reply_id=0 ORDER BY comment_id DESC");
    echo '<ul>';
    while ($row = mysql_fetch_assoc($result)) {
        $user_id = $row['user_id'];
        $first_name = mysql_result(mysql_query("SELECT first_name, last_name FROM users WHERE user_id = '$user_id'"), 0);
        $last_name = mysql_result(mysql_query("SELECT last_name FROM users WHERE user_id = '$user_id'"), 0);
        echo '<p class="commentName">' . $first_name . ' ' . $last_name . '</p>';
        echo '<div class="commentBox"><li>';
        echo '<p class="comment_time">' . $row['date'] . '</p>';
        echo '<p class="comment">' . $row['text'] . '</p>';
        get_replies($row['comment_id']);
        echo '  <form action="" method="post">
                    <hr class="replyhr">
                    <textarea class="commentReply" name="commentReply" placeholder="Skriv ett svar..."></textarea>
                    <img src="img/reply.png" class="reply" onclick="document.getElementById(\'submitReply\').click();" title="Svara">
                    <input type="submit" name="reply" style="display: none;" id="submitReply">
                </form>';
        echo '</li></div>';
    }
    echo '</ul>';
}

function get_replies() {
    $result = mysql_query("SELECT * FROM posts WHERE reply_id=$id, ORDER BY comment_id DESC");
    echo '<ul>';
    while ($row = mysql_fetch_assoc($result)) {
        echo '<li>';
        echo '<p class="comment_time">' . $row['date'] . '</p>';
        echo '<p class="comment">' . $row['text'] . '</p>';
    }
    echo '</ul>';
}
?>