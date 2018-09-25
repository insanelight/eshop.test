<?php

class Router {
	private $routes;

	public function __construct(){
		$this->routes = include(ROOT . '/config/routes.php');
	}
	private function getURI(){
		return trim($_SERVER['REQUEST_URI'],'/');
	}
	public function run(){
		$uri = $this->getURI();
		foreach ($this->routes as $uriPattern => $path) {
			if(preg_match("~$uriPattern~",$uri)){
				$internalRoute = preg_replace("|$uriPattern|",$path,$uri);
				$segments = explode('/',$internalRoute);
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'action'.ucfirst(array_shift($segments));
				$params = $segments;

				$controllerFile = ROOT . '/controllers/' . $controllerName .'.php';

				if(file_exists($controllerFile)){
					include_once($controllerFile);
				}

				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject,$actionName),$params);
				if($result != null)
					break;
			}
		}
	}
}