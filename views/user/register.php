<?php //catalog ?>
<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="products-block">
		<?php if($result):?>
			<p>Вы зарегисттрированы!</p>
		<?php else: ?>
			<?php if(isset($errors)): ?>
				<ul>
					<?php foreach($errors as $err):?>
						<li><?=$err?></li>
					<?php endforeach;?>
				</ul>
			<?php endif;?>
			<form action="#" method="post">
				<input type="text" placeholder="Имя" name="name" value="<?=$name;?>"><br><br>
				<input type="email" placeholder="E-mail" name="email" value="<?=$email;?>"><br><br>
				<input type="password" placeholder="Пароль" name="password" value="<?=$password;?>"><br><br>
				<input type="submit" name="submit" value="Регистрация">
			</form>
		<?php endif;?>

	</div>
<?php include ROOT . '/views/inc/footer.php' ?>