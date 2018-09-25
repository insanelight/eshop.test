<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<div class="login-form">
		<a href="/admin/category/">Назад</a>
		<h2>Редактировать товар : <?=$id;?></h2>
		<form action="" method="post">
			<p>Название категории</p>
			<input type="text" name="name" placeholder="" value="<?=$category['name'];?>">

			<p>Порядковый номер</p>
			<input type="text" name="sort_order" placeholder="" value="<?=$category['sort_order'];?>">

			<p>Статус</p>
			<select name="status">
				<option value="1" <?php if($category['status'] == 1) echo 'selected'; ?>>Отображается</option>
				<option value="0" <?php if($category['status'] == 0) echo 'selected'; ?>>Скрыт</option>
			</select>
			<br><br>
			<input type="submit" name="submit" value="Сохранить">
		</form>
	</div>
</body>
</html>