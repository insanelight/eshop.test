<?php //SiteController ?>
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
	<div class="products-block">
		<h2>Последние товары</h2>
		<div class="products">
			<?php foreach($latestProducts as $product):?>
				<div class="product">
					<!-- /template/images/mobile/1.jpg -->
					<img src="<?=Product::getImage($product['id']);?>">
					<h2>$<?=$product['price']?></h2>
					<p><a href="/product/<?=$product['id']?>"><?=$product['name']?></a></p>
					<a href="#">В корзину</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php include ROOT . '/views/inc/footer.php' ?>