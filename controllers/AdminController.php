<?php
/**
* Контроллер AdminController
* Главная страаница в админ панели
*/
class AdminController extends AdminBase {
	/**
	* Action для стартовой страницы Панель администратора
	*/
	public function actionIndex(){
		//проверка доступа
		self::checkAdmin();
		require_once ROOT . '/views/admin/index.php';
		return true;
	}
}