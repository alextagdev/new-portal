<?php

define ( 'DB_HOST', 'localhost' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASSWORD', 'Alexandru123@' );
define ( 'DB_NAME', 'portal' );

$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME) or die("Nu s-a conectat la server!");
?>