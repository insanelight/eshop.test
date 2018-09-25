<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Управление Заказами</title>
</head>
<body>
	<h1>Список заказов</h1>
	<table border="1">
		<tr>
			<th>ID заказа</th>
			<th>Имя покупателя</th>
			<th>Телефон покупателя</th>
			<th>Дата оформления</th>
			<th>Статус</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach($ordersList as $order): ?>
			<tr>
				<td><?=$order['id'];?></td>
				<td><?=$order['user_name'];?></td>
				<td><?=$order['user_phone'];?></td>
				<td><?=$order['date'];?></td>
				<td><?=Order::getStatusText($order['status']);?></td>
				<td><a href="/admin/order/update/<?=$order['id'];?>">UPDATE</a></td>
				<td><a href="/admin/order/delete/<?=$order['id'];?>">DELETE</a></td>
				<td><a href="/admin/order/view/<?=$order['id'];?>">VIEW</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>