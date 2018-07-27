<?php
	//-- MEEKRO DB --//
	require 'meekrodb.2.3.class.php';

	//-- WEBSERVER --//
	/*
	DB::$user = 'cbyktgeu_bluhawk';
	DB::$password = 't}wjyI3rV9sa';
	DB::$dbName = 'cbyktgeu_bluhawk';
	DB::$host = 'localhost'; //defaults to localhost if omitted
	DB::$port = '3306'; // defaults to 3306 if omitted
	DB::$encoding = 'utf8'; // defaults to latin1 if omitted
	*/
	//-- LOCALHOST --//
	
	DB::$user = 'root';
	DB::$password = '';
	DB::$dbName = 'bluhawk_ims';
	DB::$host = 'localhost'; //defaults to localhost if omitted
	DB::$port = '3306'; // defaults to 3306 if omitted
	DB::$encoding = 'utf8'; // defaults to latin1 if omitted
	
?>
<?php
	//EzSQL PHP 7
	//include_once "ez_sql_core.php";
	//include_once "ez_sql_mysqli.php";
	//$db = new ezSQL_mysqli('root','','bluhawk_ims','localhost');
	//$db = new ezSQL_mysqli('cbyktgeu_bluhawk','t}wjyI3rV9sa','cbyktgeu_bluhawk','localhost');
?>