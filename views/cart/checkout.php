<?php //оформление заказа ?>
<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="products-block">
		<?php if($result):?>
			<p>Заказ оформлен,мы вам перезвоним</p>
		<?php else: ?>
			<p>Выбрано товаров: <?php echo $totalQuantity.', на сумму: '.$totalPrice.'$'; ?></p>
			<?php if(!$result): ?>
			<?php if(isset($errors)): ?>
				<ul>
					<?php foreach($errors as $err):?>
						<li><?=$err?></li>
					<?php endforeach;?>
				</ul>
			<?php endif;?>
			<p>Для оформления заказа заполните форму:</p>
			<form action="#" method="post">
				<input type="text" placeholder="Имя" name="userName" value="<?=$userName;?>"><br><br>
				<input type="text" placeholder="Телефон" name="userPhone" value="<?=$userPhone;?>"><br><br>
				<input type="text" placeholder="Комментарий" name="userComment" value="<?=$userComment;?>"><br><br>
				<input type="submit" name="submit" value="Заказать">
			</form>
		<?php endif;?>
		<?php endif;?>

	</div>
<?php include ROOT . '/views/inc/footer.php' ?>