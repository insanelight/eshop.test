<?php

class Category {

	public static function getCurrentCategoryById($id){
			$db = Db::getConnection();
			// $result = $db->query('SELECT name FROM category WHERE id = '.$id);
			// $result->setFetchMode(PDO::FETCH_ASSOC);
			// $row = $result->fetch();
			// var_dump($row);die;

			$sql = 'SELECT name FROM category WHERE id = :id';
			$result = $db->prepare($sql);
			$result->bindParam(':id',$id,PDO::PARAM_INT);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$result->execute();
			$row = $result->fetch();
			return $row['name'];


	}

	public static function getCategoriesList(){
		$db = Db::getConnection();
		$categoryList = [];

		$result = $db->query('SELECT id, name FROM category WHERE status = 1 ORDER BY sort_order ASC');
		$i = 0;
		while($row = $result->fetch()){
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name'] = $row['name'];
			$i++;
		}
		return $categoryList;
	}
	public static function getCategoriesListAdmin(){
		$db = Db::getConnection();
		$categoryList = [];
		$result = $db->query('SELECT * FROM category ORDER BY sort_order ASC');
		$i = 0;
		while($row = $result->fetch()){
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name'] = $row['name'];
			$categoryList[$i]['sort_order'] = $row['sort_order'];
			$categoryList[$i]['status'] = $row['status'];
			$i++;
		}
		return $categoryList;
	}

	public static function getStatusText($category){
		switch($category){
			case 0:
			return 'Прототип';
			case 1:
			return 'Активная';
		}
	}
	public static function createCategory($name,$sortOrder,$status){
		$db = Db::getConnection();
		$sql = 'INSERT INTO category '
		.'(name, sort_order, status) '
		.'VALUES '
		.'(:name, :sort_order, :status)';
		$result = $db->prepare($sql);
		$result->bindParam(':name',$name,PDO::PARAM_STR);
		$result->bindParam(':sort_order',$sortOrder,PDO::PARAM_INT);
		$result->bindParam(':status',$status,PDO::PARAM_INT);
		$result->execute();
	}
	public static function getCategoryById($categoryId){
		$categoryId = intval($categoryId);
		if($categoryId){
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM category WHERE id = '.$categoryId);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			return $result->fetch();
		}
	}
	public static function updateCategoryById($id,$name,$sortOrder,$status){
		$db = Db::getConnection();
		$sql = 'UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':name',$name,PDO::PARAM_STR);
		$result->bindParam(':sort_order',$sortOrder,PDO::PARAM_INT);
		$result->bindParam(':status',$status,PDO::PARAM_INT);
		$result->bindParam(':id',$id,PDO::PARAM_INT);
		return $result->execute();
	}
	public static function deleteCategoryById($id){
		$db = Db::getConnection();

		$sql = 'DELETE FROM category WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id',$id,PDO::PARAM_INT);
		return $result->execute();
	}
}