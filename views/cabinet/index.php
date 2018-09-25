<?php //Кабинет пользователя ?>
<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="category">
		<h2>Кабинет пользователя</h2>
		<h4>Привет, <?=$user['name']?></h4>
	</div>
	<div class="products-block">
		<a href="/cabinet/edit">Редактировать данные</a>
		<a href="/cabinet/history">Список покупок</a>
	</div>
<?php include ROOT . '/views/inc/footer.php' ?>