<?php
try {
	$dsn = "mysql:host=fs.mis.kuas.edu.tw;dbname=s1102137107;charset=utf8";
	$username='s1102137107';
	$passwd='88888';
	$db = new PDO($dsn,$username,$passwd);
	
}
catch (PDOException $e){
	echo $e->getTraceAsString();;
	die();
}
?> 