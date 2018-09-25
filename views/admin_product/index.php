<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Управление товарами</title>
</head>
<body>
	<a href="/admin/product/create">Добавить товар</a>
	<h1>Список товаров</h1>
	<table border="1">
		<tr>
			<th>ID товара</th>
			<th>Артикул</th>
			<th>Название товара</th>
			<th>Цена</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach($productsList as $product): ?>
			<tr>
				<td><?=$product['id'];?></td>
				<td><?=$product['code'];?></td>
				<td><?=$product['name'];?></td>
				<td><?=$product['price'];?></td>
				<td><a href="/admin/product/update/<?=$product['id'];?>">UPD</a></td>
				<td><a href="/admin/product/delete/<?=$product['id'];?>">DEL</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>