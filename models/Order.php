<?php

class Order{

	public static function save($userName,$userPhone,$userComment,$userId,$products){
		$db = Db::getConnection();
		$products = json_encode($products);

		$sql = 'insert into product_order(user_name,user_phone,user_comment,user_id,products) '
				.'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

		$result = $db->prepare($sql);
		$result->bindParam(':user_name',$userName,PDO::PARAM_STR);
		$result->bindParam(':user_phone',$userPhone,PDO::PARAM_STR);
		$result->bindParam(':user_comment',$userComment,PDO::PARAM_STR);
		$result->bindParam(':user_id',$userId,PDO::PARAM_STR);
		$result->bindParam(':products',$products,PDO::PARAM_STR);

		return $result->execute();
	}

	public static function getOrderById($id){
		$db = Db::getConnection();

		$sql = 'SELECT * FROM product_order WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id',$id,PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		return $result->fetch();
	}

	public static function getStatusText($status){
		switch($status){
			case 1:
			return 'в ожидании';
			case 2:
			return 'обрабатывается';
			case 3:
			return 'курьер выехал';
			case 4:
			return 'выполнен';
		}
	}

	public static function getOrdersList(){
		$db = Db::getConnection();
		$result = $db->query('SELECT * FROM product_order ORDER BY id ASC');
		$ordersList = [];
		$i = 0;
		while($row = $result->fetch()){
			$ordersList[$i]['id'] = $row['id'];
			$ordersList[$i]['user_name'] = $row['user_name'];
			$ordersList[$i]['user_phone'] = $row['user_phone'];
			$ordersList[$i]['user_comment'] = $row['user_comment'];
			$ordersList[$i]['user_id'] = $row['user_id'];
			$ordersList[$i]['date'] = $row['date'];
			$ordersList[$i]['products'] = $row['products'];
			$ordersList[$i]['status'] = $row['status'];
			$i++;
		}
		return $ordersList;
	}

	public static function deleteOrderById($id){
		$db = Db::getConnection();

		$sql = 'DELETE FROM product_order WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':id',$id,PDO::PARAM_INT);
		return $result->execute();
	}

	public static function updateOrderById($id,$options){
		$db = Db::getConnection();
		$sql = 'UPDATE product_order SET '
		.'user_name = :user_name, '
		.'user_phone = :user_phone, '
		.'user_comment = :user_comment, '
		.'user_id = :user_id, '
		.'status = :status '
		.'WHERE id = :id';
		$result = $db->prepare($sql);
		$result->bindParam(':user_name',$options['user_name'],PDO::PARAM_STR);
		$result->bindParam(':user_phone',$options['user_phone'],PDO::PARAM_STR);
		$result->bindParam(':user_comment',$options['user_comment'],PDO::PARAM_STR);
		$result->bindParam(':user_id',$options['user_id'],PDO::PARAM_INT);
		$result->bindParam(':status',$options['status'],PDO::PARAM_INT);
		$result->bindParam(':id',$id,PDO::PARAM_INT);
		return $result->execute();
	}
}