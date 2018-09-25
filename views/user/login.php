<?php //страница входа пользователя ?>
<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="products-block">
		<?php if(isset($errors)): ?>
			<ul>
				<?php foreach($errors as $err):?>
					<li><?=$err?></li>
				<?php endforeach;?>
			</ul>
		<?php endif;?>
		<form action="#" method="post">
			<input type="email" placeholder="E-mail" name="email" value="<?=$email;?>"><br><br>
			<input type="password" placeholder="Пароль" name="password" value="<?=$password;?>"><br><br>
			<input type="submit" name="submit" value="Войти">
		</form>
	</div>
<?php include ROOT . '/views/inc/footer.php' ?>