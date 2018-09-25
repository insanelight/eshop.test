<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<div class="login-form">
		<a href="/admin/product/">Назад</a>
		<form action="#" method="post" enctype="multipart/form-data">
			<p>Название товара</p>
			<input type="text" name="name" placeholder="" value="">

			<p>Артикул</p>
			<input type="text" name="code" placeholder="" value="">

			<p>Стоимость</p>
			<input type="text" name="price" placeholder="" value="">
			<p>Категория</p>
			<select name="category_id">
				<?php if(is_array($categoriesList)):?>
					<?php foreach($categoriesList as $category): ?>
						<option value="<?=$category['id'];?>"><?=$category['name']?></option>
					<?php endforeach; ?>
				<?php endif;?>
			</select>
			<br><br>

			<p>Производитель</p>
			<input type="text" name="brand" placeholder="" value="">
			<p>Изображение товара</p>
			<input type="file" name="image" placeholder="" value="">
			<p>Детальное описание</p>
			<textarea name="description"></textarea>
			<br><br>
			<p>Наличие на складе</p>
			<select name="availability">
				<option value="1" selected>Да</option>
				<option value="0" >Нет</option>
			</select>
			<br><br>
			<p>Новинка</p>
			<select name="is_new">
				<option value="1" selected>Да</option>
				<option value="0">Нет</option>
			</select>
			<br><br>
			<p>Рекомендуемый</p>
			<select name="is_recommended">
				<option value="1" selected>Да</option>
				<option value="0">Нет</option>
			</select>
			<br><br>
			<p>Статус</p>
			<select name="status">
				<option value="1">Отображается</option>
				<option value="0">Скрыт</option>
			</select>
			<br><br>
			<input type="submit" name="submit" value="Сохранить">
		</form>
	</div>
</body>
</html>