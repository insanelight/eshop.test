<?php

class CabinetController {
	public function actionIndex(){
		$userId = User::checkLogged();

		$user = User::getUserById($userId);
		require_once ROOT . '/views/cabinet/index.php';
		return true;
	}

	public function actionEdit(){
		$userId = User::checkLogged();

		$user = User::getUserById($userId);

		$name = $user['name'];
		$password = $user['password'];

		$result = false;

		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$password = $_POST['password'];
			$errors = false;

			if(!User::checkName($name))
				$errors[] = 'Имя должно быть не короче 2х символов';
			if(!User::checkPassword($password))
				$errors[] = 'пароль не должен быть короче 6ти символов';
			if($errors == false){
				//сохранение
				$result = User::edit($userId,$name,$password);
			}
		}
		require_once ROOT . '/views/cabinet/edit.php';
		return true;
	}

	public function actionHistory(){

		require_once ROOT . '/views/cabinet/history.php';
	}
}