<?php //обратная связь ?>
<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="products-block">
		<?php if($result):?>
			<p>Спасибо за отзыв,мы вам ответим в ближайшее время.</p>
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
				<textarea></textarea>
				<input type="submit" name="submit" value="Отправить">
			</form>
		<?php endif;?>

	</div>
<?php include ROOT . '/views/inc/footer.php' ?>