<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<div class="login-form">
		<a href="/admin/product/">Назад</a>
		<h2>Добавление новой категории</h2>
		<?php if(isset($errors)) :?>
			<ul>
				<?php foreach($errors as $err): ?>
					<li><?=$err?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif;?>
		<form action="#" method="post" enctype="multipart/form-data">
			<p>Название категории: </p>
			<input type="text" name="name" placeholder="" value="">
			<p>Порядковый номер</p>
			<input type="text" name="sort_order" placeholder="" value="">
			<p>Статус</p>
			<select name="status">
				<option value="1" selected>Отображается</option>
				<option value="0">Скрыт</option>
			</select>
			<br><br>
			<input type="submit" name="submit" value="Сохранить">
		</form>
	</div>
</body>
</html>