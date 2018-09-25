<?php

/**
* Абстрактный класс AdminBase содержит общую логику для контроллеров, которые
* используются в панели администратора
*/
abstract class AdminBase {
	public static function checkAdmin(){
		//проверка авторизации, если нет он будет переадресован
		$userId = User::checkLogged();

		//получаем информацию о текущем пользователе
		$user = User::getUserById($userId);

		//если роль текущего пользователя admin то пускаем
		if($user['role'] == 'admin')
			return true;
		//иначе завершаем работу скрипта
		die('ACCESS DENIED');
	}
}