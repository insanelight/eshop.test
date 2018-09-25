<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Заказ номер <?=$id;?></title>
</head>
<body>
	<h2>Заказ номер <?=$id;?></h2>
	<h3>Информация о заказе</h3>
	<table border="1">
		<tr>
			<td>Номер заказа</td>
			<td><?=$order['id'];?></td>
		</tr>
		<tr>
			<td>Имя клиента</td>
			<td><?=$order['user_name'];?></td>
		</tr>
		<tr>
			<td>Телефон клиента</td>
			<td><?=$order['user_phone'];?></td>
		</tr>
		<tr>
			<td>Комментарий клиента</td>
			<td><?=$order['user_comment'];?></td>
		</tr>
		<?php if($order['user_id'] != 0): ?>
			<tr>
				<td>ID клиента</td>
				<td><?=$order['user_id'];?></td>
			</tr>
		<?php endif; ?>
		<tr>
			<td>Статус заказа</td>
			<td><?=Order::getStatusText($order['status']);?></td>
		</tr>
		<tr>
			<td>Дата заказа</td>
			<td><?=$order['date'];?></td>
		</tr>
	</table>

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
</body>
</html>