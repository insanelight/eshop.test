<?php

class CartController {
	public function actionAdd($id){
		Cart::addProduct($id);

		//возврат пользователя на страницу
		$referer = $_SERVER['HTTP_REFERER'];
		header("Location: $referer");
	}
	public function actionDelete($id){
		//удалить товар из корзины
		Cart::deleteProduct($id);
		header('Location: /cart/');
	}
	public function actionAddAjax($id){
		echo Cart::addProduct($id);
		return true;
	}

	public function actionIndex(){
		$categories = Category::getCategoriesList();

		$productsInCart = false;
		$productsInCart = Cart::getProducts();

		if($productsInCart) {
			//Получаем полную информацию о товарах для списка
			$productsId = array_keys($productsInCart);
			$products = Product::getProductsByIds($productsId);

			//получаем общую стоимость
			$totalPrice = Cart::getTotalPrice($products);
		}

		require_once ROOT . '/views/cart/index.php';
		return true;
	}

	public function actionCheckout(){
		//список категорий для левого меню
		$categories = Category::getCategoriesList();

		//статус успешного оформления заказа
		$result = false;

		if(isset($_POST['submit'])){
			//получаем данные с формы
			$userName = $_POST['userName'];
			$userPhone = $_POST['userPhone'];
			$userComment = $_POST['userComment'];

			//валидация полей
			$errors = false;
			if(!User::checkName($userName)){
				$errors[] = 'не правильные имя';
			}
			if(!User::checkPhone($userPhone)){
				$errors[] = 'не правильный телефон';
			}
			if(!$errors){
				//форма заполнена корректно? да
				//сохраняем заказ в базе данных

				//собираем информацию о заказе
				$productsInCart = Cart::getProducts();
				if(User::isGuest()){
					$userId = false;
				}
				else {
					$userId = User::checkLogged();
				}

				//сохраняем заказ в бд
				$result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

				if($result){
					//отправляем уведомление админу о новом заказе

					//очищаем корзину
					Cart::clear();
				}

			}
			else {
				//форма заполнена корректно? нет

				//итоги: общая стоимость,количество товаров
				$productsInCart = Cart::getProducts();
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalQuantity = Cart::countItems();
			}

		}
		else{
			//форма отправлена-нет
			//получаем данные из корзины
			$productsInCart = Cart::getProducts();

			//в корзине есть товары?
			if(!$productsInCart){
				//в корзине есть товары -нет
				header('Location: /');
			}
			else {
				//в корзине есть товары - да
				//итоги - общая стоимость,количество товаров
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalQuantity = Cart::countItems();

				$userName = false;
				$userPhone = false;
				$userComment = false;

				//пользователь авторизован
				if(!User::isGuest()){
					//пользователь авторизован - да
					$userId = User::checkLogged();
					$user = User::getUserById($userId);
					//подставляем в форму
					$userName = $user['name'];
				}
				//ничего не подставляем,если пользователь не авторизован
			}

		}

		require_once ROOT . '/views/cart/checkout.php';
		return true;
	}
}