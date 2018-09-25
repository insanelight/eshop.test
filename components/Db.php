<?php

class Db {
	public static function getConnection(){
		$path = ROOT . '/config/db_params.php';
		$params = include($path);

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn,$params['user'],$params['password']);
		$db->exec('SET names utf-8');
		return $db;
	}
}