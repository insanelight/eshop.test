<?php

class UserController {
	//страница регистрации пользователей

	public function actionRegister(){
		$name = '';
		$email = '';
		$password = '';
		$result = false;

		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;
			if(!User::checkName($name))
				$errors[] = 'Имя должно быть не короче 2х символов';
			if(!User::checkEmail($email))
				$errors[] = 'неверный email';
			if(!User::checkPassword($password))
				$errors[] = 'пароль не должен быть короче 6ти символов';
			if(User::checkEmailExists($email))
				$errors[] = 'такой email уже занят';
			if($errors == false){
				//сохранение
				$result = User::register($name,$email,$password);
			}
		}
		require_once ROOT . '/views/user/register.php';
		return true;
	}
	public function actionLogin(){
		$email = '';
		$password = '';

		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$errors = false;

			if(!User::checkEmail($email))
				$errors[] = 'неверный email';
			if(!User::checkPassword($password))
				$errors[] = 'пароль не должен быть короче 6ти символов';

			$userId = User::checkUserData($email,$password);
			if(!$userId)
				$errors[] = 'неверное имя пользователя или пароль';
			else {
				User::auth($userId);
				header('Location: /cabinet/');
			}
		}
		require_once ROOT . '/views/user/login.php';
		return true;
	}

	public function actionLogout(){
		session_start();
		unset($_SESSION['user']);
		header('Location: /');
	}
}
