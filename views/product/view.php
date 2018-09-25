<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="category">
		<h2>Каталог</h2>
		<nav>
			<ul>
				<?php foreach($categories as $category): ?>
					<li><a href="/category/<?=$category['id']?>"><?=$category['name'];?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
	<div class="product-desc">
		<h2><?=$product['name'];?></h2>
		<h3>Производитель: <?=$product['brand'];?></h3>
		<h3>Код товара: <?=$product['code'];?></h3>
		<h3>Цена: $<?=$product['price'];?></h3>
		<h4>Наличие: <?=$product['availability']? 'На складе':'Нет в наличии';?></h4>
		<img src="<?=Product::getImage($product['id']);?>">
		<!-- <img src="/template/images/mobile/1.jpg" width="200px"> -->
		<p><?=$product['description'];?></p>
	</div>
<?php include ROOT . '/views/inc/footer.php' ?>