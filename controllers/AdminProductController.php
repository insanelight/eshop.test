<?php
/**
* Контроллер AdminProductController
* Управление товарами в админпанели
*/
class AdminProductController extends AdminBase {
	/**
	* Action для страницы управления товарами
	*/
	public function actionIndex(){
		//проверка доступа
		self::checkAdmin();

		//получаем список товаров
		$productsList = Product::getProductsList();

		//подключаем вид
		require_once ROOT . '/views/admin_product/index.php';
		return true;
	}

	public function actionDelete($id){
		//проверка доступа
		self::checkAdmin();
		if(isset($_POST['submit'])){
			Product::deleteProductById($id);
			header('Location: /admin/product');
		}

		require_once ROOT . '/views/admin_product/delete.php';
		return true;
	}
	public function actionCreate(){
		self::checkAdmin();
		//получаем весь список категорий,в том числе отключенных для отображение в выпадающем списке
		$categoriesList = Category::getCategoriesListAdmin();
		if(isset($_POST['submit'])){
			//если форма отправлена,получаем все данные с формы
			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['availability'] = $_POST['availability'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];
			$options['image'] = $_POST['image'];

			//ошибки
			$errors = false;
			if(!empty($option['name'])) {
				$errors[] = 'Не все поля были заполнены';
			}
			if($errors == false){
				//ошибок нет
				//добавляем товар
				$id = Product::createProduct($options);
				//если запись успешно добавлена метод вернет id товара
				if($id){
					//проверяем был ли загружен файл изображения
					if(is_uploaded_file($_FILES['image']['tmp_name'])){
						//если изоображение загружалось
						move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
					}
				}

				//перенаправление пользователя
				header('Location: /admin/product/');
			}
		}
		require_once ROOT . '/views/admin_product/create.php';
		return true;
	}

	public function actionUpdate($id){
		self::checkAdmin();
		$categoriesList = Category::getCategoriesListAdmin();

		//получаем данные о конкретном товаре
		$product = Product::getProductById($id);

		//обработка формы
		if(isset($_POST['submit'])){
			//если форма отправлена,получаем все данные с формы
			$options['name'] = $_POST['name'];
			$options['code'] = $_POST['code'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['availability'] = $_POST['availability'];
			$options['description'] = $_POST['description'];
			$options['is_new'] = $_POST['is_new'];
			$options['is_recommended'] = $_POST['is_recommended'];
			$options['status'] = $_POST['status'];
			$options['image'] = $_POST['image'];


			if(Product::updateProductById($id,$options)){
				//проверяем был ли загружен файл изображения
					if(is_uploaded_file($_FILES['image']['tmp_name'])){
						//если изоображение загружалось
						move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
					}
			}

			header('Location: admin/product/');
		}

		require_once ROOT . '/views/admin_product/update.php';
		return true;
	}
}