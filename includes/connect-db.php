<?php
try{
	//new instance of pdo object and connect to the database
	$db = new PDO ('mysql:host=127.0.0.1;dbname=leancon', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->exec("SET CHARACTER SET utf8"); // Sets encoding UTF-8



	//var_dump($db);
}catch(PDOException $e) {
	//echo "Error connecting to the databse"."<br>"."<hr>";
	echo $e->getMessage();
	die();
}


?>
