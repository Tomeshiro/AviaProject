<?php
DEFINE('DB_USER','user');
DEFINE('DB_PASSWORD','password');
DEFINE('DB_HOST','db');
DEFINE('DB_NAME','appDB');

$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
OR dies('Could not connect to MySQL:' .
	mysqli_connect_error());
?>
