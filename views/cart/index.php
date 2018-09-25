<?php //category ?>
<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="category">
		<h2>Каталог</h2>
		<nav>
			<ul>
				<?php foreach($categories as $category): ?>
					<li>
						<a href="/category/<?=$category['id']?>">
							<?=$category['name'];?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
	<div class="products-block">
		<h2>Корзина</h2>
		<?php if($productsInCart): ?>
			<p>Ваши товары:</p>
			<table border="1">
				<tr>
					<th>Код товара</th>
					<th>Название</th>
					<th>Стоимость</th>
					<th>Количество</th>
					<th>Удалить</th>
				</tr>
				<?php foreach($products as $product):?>
					<tr>
						<td><?=$product['code'];?></td>
						<td><a href="/product/<?=$product['id']?>"><?=$product['name']?></a></td>
						<td><?=$product['price'];?></td>
						<td><?=$productsInCart[$product['id']];?></td>
						<td><a href="/cart/delete/<?=$product['id'];?>">-</a></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="3">Общая стоимость: </td>
					<td><?=$totalPrice;?></td>
				</tr>
			</table>
			<a href="/cart/checkout/">Оформить заказ</a>
		<?php else:?>
			<p>Корзина пуста!</p>
		<?php endif; ?>
	</div>
	<?php include ROOT . '/views/inc/footer.php' ?>