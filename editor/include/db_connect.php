<?php




if($_SERVER['SERVER_NAME'] == "localhost"){
    $pdo_mysql 		= "mysql:host=localhost;dbname=wiso";
	$pdo_db_user	= "wiso";
	$pdo_db_pwd		= "wiso";

	$server			= "localhost";
    $db_debug_mode 	= 0; // 1= on, else = off
	
	
}else if($_SERVER['SERVER_NAME'] == "192.168.178.21"){
    $pdo_mysql 		= "mysql:host=localhost;dbname=wiso";
	$pdo_db_user	= "wiso";
	$pdo_db_pwd		= "wiso";

	$server			= "localhost";
    $db_debug_mode 	= 0; // 1= on, else = off
	
	
}else{
	$pdo_mysql 		= "mysql:host=rdbms.strato.de;dbname=DB3903424";
	$pdo_db_user	= "U3903424";
	$pdo_db_pwd		= "d0f166fe2cc118c94ce4871a03be92c31b99ea67c84260215dd581dc66";

	$server			= "rdbms.strato.de";
	$db_debug_mode 	= 0; // 1= on, else = off
}
?>