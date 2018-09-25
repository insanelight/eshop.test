<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Магазин</title>
	<link rel="stylesheet" type="text/css" href="/template/css/style.css">
	<script
	src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="up">
			<p><?= User::isGuest() ? 'Приветствую, гость!' : 'И снова здравствуйте дорогой пользователь!';?></p>
 		</div>
		<div class="head-block">
			<div class="logo"><a href="/">E-commerce</a></div>
			<div class="auth">
				<a href="/cart/">Корзина <span id="cart-count"><?=Cart::countItems();?></span></a>
				<?php if(User::isGuest()): ?>
					<a href="/user/login/">Вход</a>
					<a href="/user/register/">Регистрация</a>
				<?php else: ?>
					<a href="/cabinet/">Аккаунт</a>
					<a href="/user/logout/">Выход</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="menu">
			<nav>
				<ul>
					<li><a href="/">Главная</a></li>
					<li><a href="/catalog/">Каталог товаров</a></li>
					<li><a href="/contact/">Контакты</a></li>
				</ul>
			</nav>
		</div>
	</header>