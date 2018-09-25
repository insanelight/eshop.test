<?php
// подключаются с помощью Autoload.php
// include_once ROOT . '/models/Category.php';
// include_once ROOT . '/models/Product.php';
// include_once ROOT . '/components/Pagination.php';

class CatalogController{
	public function actionIndex(){
		$categories = Category::getCategoriesList();
		$latestProducts = Product::getLatestProducts(12);
		require_once(ROOT . '/views/catalog/index.php');

		return true;
	}
	public function actionCategory($categoryId,$page = 1){

		$categories = Category::getCategoriesList();
		$currentCategory = Category::getCurrentCategoryById($categoryId);

		$categoryProducts = Product::getProductsListByCategory($categoryId,$page);

		$total = Product::getTotalProductsInCategory($categoryId);

		$pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');

		require_once(ROOT . '/views/catalog/category.php');
		return true;
	}
}