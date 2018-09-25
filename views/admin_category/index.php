<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Управление товарами</title>
</head>
<body>
	<a href="/admin/category/create">Добавить категорию</a>
	<h1>Список товаров</h1>
	<table border="1">
		<tr>
			<th>ID категории</th>
			<th>Название категории</th>
			<th>Порядковый номер</th>
			<th>Статус</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach($categoriesList as $category): ?>
			<tr>
				<td><?=$category['id'];?></td>
				<td><?=$category['name'];?></td>
				<td><?=$category['sort_order'];?></td>
				<td><?=Category::getStatusText($category['status']);?></td>
				<td><a href="/admin/category/update/<?=$category['id'];?>">UPD</a></td>
				<td><a href="/admin/category/delete/<?=$category['id'];?>">DEL</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>