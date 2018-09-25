<?php

class Cart {

	public static function addProduct($id){
		$id = intval($id);

		//пустой массив для товаров в корзине
		$productsInCart = [];


		//если в сессии уже есть товары,добавляем в массив товаров
		if(isset($_SESSION['products'])){
			$productsInCart = $_SESSION['products'];
		}
		//если товар уже есть в корзине,но был добавлен еще раз
		if(array_key_exists($id, $productsInCart))
			$productsInCart[$id]++;
		else
			$productsInCart[$id] = 1;

		//обновляем/добавляем хранилище сессии
		$_SESSION['products'] = $productsInCart;
		return self::countItems();
	}

	public static function countItems(){
		if(isset($_SESSION['products'])){
			$count = 0;
			foreach($_SESSION['products'] as $id => $quantity){
				$count += $quantity;
			}
			return $count;
		}
		return 0;
	}

	public static function getProducts(){
		if(isset($_SESSION['products']))
			return $_SESSION['products'];
		return false;
	}

	public static function getTotalPrice($products){
		$productsInCart = self::getProducts();

		$total = 0;
		if($productsInCart){
			foreach($products as $item){
				$total += $item['price'] * $productsInCart[$item['id']];
			}
		}
		return $total;
	}

	public static function clear(){
		if(isset($_SESSION['products']))
			unset($_SESSION['products']);
	}
	public static function deleteProduct($id){
		$productsInCart = self::getProducts();
		if(--$productsInCart[$id] == 0)
			unset($productsInCart[$id]);
		$_SESSION['products'] = $productsInCart;
	}
}