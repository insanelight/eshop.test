<?php
//подключаются с помощью Autoload.php
// include_once ROOT . '/models/Category.php';
// include_once ROOT . '/models/Product.php';

class SiteController {
	public function actionIndex(){
		$categories = Category::getCategoriesList();//получаем категории в массив для дальнейшего вывода в views/site/index.php

		$latestProducts = Product::getLatestProducts(6);
		require_once(ROOT. '/views/site/index.php');
		return true;
	}

	public function actionContact(){
		$userEmail ='';
		$userText = '';
		$result = false;

		if(isset($_POST['submit'])){
			$userEmail = $_POST['userEmail'];
			$userText = $_POST['userText'];

			$errors = false;

			if(!User::checkEmail($userEmail)){
				$errors[] = 'не правильный email';
			}
			if(!$errors){
				$adminEmail = 'fuckenpro@list.ru';
				$message = 'message: от '.$userEmail;
				$subject = 'theme';
				// $result = mail(0)
				$result = true;
			}
		}
		require ROOT . '/views/site/contact.php';
		return true;
	}
}