<?php

function __autoload($class_name){
	$array_paths = [
		'/models/',
		'/components/'
	];
	foreach ($array_paths as $path) {
		$path = ROOT . $path . $class_name .'.php';
		if(file_exists($path)){
			include_once($path);
		}
	}
}