<?php
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

$errors = array();

<<<<<<< HEAD
if (logged_in() === true) {
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'first_name', 'last_name', 'email', 'password');
}

=======
function logged_in() {return false;}
>>>>>>> e9ada67902b802c886067680f8d5de3c024fecdd
?>