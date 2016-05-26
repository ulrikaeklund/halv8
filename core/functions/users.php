<?php
function change_profile_image($user_id, $file_temp, $file_extn){
    $file_path = 'img/pictures/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
    move_uploaded_file($file_temp, $file_path);
    mysql_query("UPDATE users SET profile = '". mysql_real_escape_string($file_path) ."' WHERE user_id = " . (int)$user_id);
}

//function upload_comment_pic($user_id, $file_temp, $file_extn){
//    $file_path = 'img/pictures/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
//    move_uploaded_file($file_temp, $file_path);
//    
//    return $file_path
//}

function register_user($register_data) {
    array_walk($register_data, 'array_sanitize');
    $salt = substr(sha1(mt_rand()),0,22);
    $register_data['salt'] = $salt;
    $register_data['password'] = sha1($salt . $register_data['password']);    
    
    $fields = implode(', ', array_keys($register_data));
    $data = '\'' . implode('\', \'', $register_data) . '\'';

    mysql_query("INSERT INTO users ($fields) VALUES ($data)");
}

function encrypt_password($email, $password) {
    $user_id = user_id_from_email($email);
    $salt = mysql_result(mysql_query("SELECT salt FROM users WHERE user_id = '$user_id'"), 0);
    return sha1($salt . $password);
}

function user_data($user_id) {
    $data = array();
    $user_id = (int)$user_id;
    
    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    
    if ($func_num_args > 1) {
        unset($func_get_args[0]);
    }
    
    $fields = ' '. implode(', ', $func_get_args) . ' ';
    $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM users WHERE user_id = '$user_id'"));
    return $data;
}

function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($email) {
    $email = sanitize($email);
    $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE email = '$email'");
    return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_email($email) {
    $email = sanitize($email);
    return mysql_result(mysql_query("SELECT user_id FROM users WHERE email = '$email'"), 0, user_id);
}

function login($email, $password) {
    $user_id = user_id_from_email($email);
    $email = sanitize($email);
    $password = sanitize($password);
    
    return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE email = '$email' AND password = '$password'"), 0) == 1) ? $user_id : false;
}
?>