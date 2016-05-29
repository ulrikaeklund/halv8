<?php
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
require 'functions/comments.php';
require 'functions/match.php';

$errors = array();

if (logged_in() === true) {
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'user_id', 'first_name', 'last_name', 'email', 'password', 'city', 'dagar', 'searching', 'profile', 'bjudning_id', 'accept', 'about');
}

?>