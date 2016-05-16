<?php
$connect_error = 'Vi upplever problem för tillfället. Vänligen försök igen senare.';
mysql_connect('localhost', 'root', 'root') or die ($connet_error);
mysql_select_db('halv8') or die ($connect_error);
?>