<?php

	$db = "mysql";
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "cardtec";
	$port = 3306;
	$connect;

   			
		try{
            $conn2 = new PDO($db . ':host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
			} catch (Exception $ex) {
				Die ('Erro no acesso, entre em contato com o administrador');
		}			
	

?>