<?php
include 'connection.php';

//Delete comments
function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {
        $ID = $_POST['ID'];
        $sql = "DELETE FROM posts WHERE ID='$ID'";
        $result = $conn->query($sql);
        header('Location: ../index.php');    
    }
}



//getComments

    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
        echo "<p id='comment-name'>", $row['name'], "</p>";
        echo "<p id='comment-date'>", substr_replace($row['date'], "", -3), "</p>";
        echo "<p id='comment-text'>", "\"" . $row['comment'] . "\"", "</p>";
        //Delete comments
        echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                <input type='hidden' name='ID' value='".$row['ID']."'>
                <button type='submit' name='commentDelete'>Delete</button>
              </form>
        </div>";
}   

?>