<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<div class="login-form">
		<a href="/admin/product/">Назад</a>
		<h2>Редактировать товар : <?=$id;?></h2>
		<form action="#" method="post" enctype="multipart/form-data">
			<p>Название товара</p>
			<input type="text" name="name" placeholder="" value="<?=$product['name'];?>">

			<p>Артикул</p>
			<input type="text" name="code" placeholder="" value="<?=$product['code'];?>">

			<p>Стоимость</p>
			<input type="text" name="price" placeholder="" value="<?=$product['price'];?>">
			<p>Категория</p>
			<select name="category_id">
				<?php if(is_array($categoriesList)):?>
					<?php foreach($categoriesList as $category): ?>
						<option value="<?=$category['id'];?>" <?php if($category['id'] == $product['category_id']) echo 'selected';?> ><?=$category['name']?></option>
					<?php endforeach; ?>
				<?php endif;?>
			</select>
			<br><br>

			<p>Производитель</p>
			<input type="text" name="brand" placeholder="" value="<?=$product['brand'];?>">
			<p>Изображение товара</p>
			<img src="<?php echo Product::getImage($product['id']);?>" width="200"><br>
			<input type="file" name="image" placeholder="" value="<?=$product['image'];?>">
			<p>Детальное описание</p>
			<textarea name="description"><?=$product['description']?></textarea>
			<br><br>
			<p>Наличие на складе</p>
			<select name="availability">
				<option value="1" <?php if($product['availability'] == 1) echo 'selected'; ?> >Да</option>
				<option value="0" <?php if($product['availability'] == 0) echo 'selected'; ?> >Нет</option>
			</select>
			<br><br>
			<p>Новинка</p>
			<select name="is_new">
				<option value="1" <?php if($product['is_new'] == 1) echo 'selected'; ?>>Да</option>
				<option value="0" <?php if($product['is_new'] == 0) echo 'selected'; ?>>Нет</option>
			</select>
			<br><br>
			<p>Рекомендуемый</p>
			<select name="is_recommended">
				<option value="1" <?php if($product['is_recommended'] == 1) echo 'selected'; ?>>Да</option>
				<option value="0" <?php if($product['is_recommended'] == 0) echo 'selected'; ?>>Нет</option>
			</select>
			<br><br>
			<p>Статус</p>
			<select name="status">
				<option value="1" <?php if($product['status'] == 1) echo 'selected'; ?>>Отображается</option>
				<option value="0" <?php if($product['status'] == 0) echo 'selected'; ?>>Скрыт</option>
			</select>
			<br><br>
			<input type="submit" name="submit" value="Сохранить">
		</form>
	</div>
</body>
</html>