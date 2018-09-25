<?php

class AdminOrderController extends AdminBase {

	public function actionIndex(){
		self::checkAdmin();
		$ordersList = Order::getOrdersList();

		require_once ROOT . '/views/admin_order/index.php';
		return true;
	}
	public function actionUpdate($id){
		self::checkAdmin();

		$order = Order::getOrderById($id);

		$productQuantity = json_decode($order['products'],true);

		$productsIds = array_keys($productQuantity);

		$products = Product::getProductsByIds($productsIds);

		if(isset($_POST['submit'])){
			$options['user_name'] = $_POST['userName'];
			$options['user_phone'] = $_POST['userPhone'];
			$options['user_comment'] = $_POST['userComment'];
			$options['user_comment'] = $_POST['userComment'];
			$options['user_id'] = $_POST['userId'];
			$options['status'] = $_POST['status'];
			Order::updateOrderById($id,$options);
			header('Location: admin/order/');
		}
		require_once ROOT . '/views/admin_order/update.php';
		return true;
	}
	public function actionDelete($id){
		self::checkAdmin();

		if(isset($_POST['submit'])){
			Order::deleteOrderById($id);
			header('Location: /admin/order/');
		}
		require_once ROOT . '/views/admin_order/delete.php';
		return true;
	}
	public function actionView($id){
		self::checkAdmin();

		$order = Order::getOrderById($id);

		//получаем массив товаров из бд
		$productQuantity = json_decode($order['products'],true);

		//получаем массив с идентификаторами товаров
		$productsIds = array_keys($productQuantity);

		//получаем список товаров в заказе
		$products = Product::getProductsByIds($productsIds);

		require_once ROOT . '/views/admin_order/view.php';
		return true;
	}
}