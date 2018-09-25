<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Товары в заказе:</h3>
	<table border="1">
		<tr>
			<th>ID товара</th>
			<th>Артикул товара</th>
			<th>Название товара</th>
			<th>Цена товара</th>
			<th>Количество</th>
		</tr>
		<?php foreach($products as $product): ?>
			<tr>
				<td><?=$product['id'];?></td>
				<td><?=$product['code'];?></td>
				<td><?=$product['name'];?></td>
				<td><?=$product['price']?></td>
				<td><?=$productQuantity[$product['id']];?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<form action="#" method="post">
		<p>Имя заказчика</p>
		<input type="text" name="userName" value="<?=$order['user_name'];?>"><br>
		<p>Контактный телефон</p>
		<input type="text" name="userPhone" value="<?=$order['user_phone'];?>"><br>
		<p>Комментарий</p>
		<input type="text" name="userComment" value="<?=$order['user_comment'];?>"><br>
		<p>ID пользователя</p>
		<input type="text" name="userId" value="<?=$order['user_id'];?>"><br>
		<p>Дата заказа</p>
		<input type="text" name="date" value="<?=$order['date'];?>" disabled><br>
		<p>Статус заказа</p>
		<select name="status">
			<option value="1" <?php if($order['status'] == 1) echo 'selected'; ?> >В ожидании</option>
			<option value="2" <?php if($order['status'] == 2) echo 'selected'; ?> >Обрабатывается</option>
			<option value="3" <?php if($order['status'] == 3) echo 'selected'; ?> >Курьер выехал</option>
			<option value="4" <?php if($order['status'] == 4) echo 'selected'; ?> >Выполнен</option>
		</select>
		<br><br>
		<input type="submit" name="submit" value="сохранить">
	</form>
</body>
</html>