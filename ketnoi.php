<?php
define('hostname', 'localhost');
define('username', 'root');
define('user_pass','');
define('db_name','Baitap-bootstrap');
define('base_url','abc.com');

$con=mysql_connect(hostname, username, user_pass) or die ('Khong ket noi duoc db');

mysql_select_db(db_name, $con) or die ('khong tim thay db');

mysql_query("setnames 'utf8'");
?>