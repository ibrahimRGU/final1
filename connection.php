<?php

define('DB_SERVER','127.0.0.1');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','testlab');

/*
 define('DB_SERVER','ap-cdbr-azure-east-c.cloudapp.net');
define('DB_USER','b46959495d6832');
define('DB_PASSWORD','0eb13c86');
define('DB_DATABASE','dev2705db');
*/
$db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

?>