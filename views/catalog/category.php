<?php //category ?>
<?php include ROOT . '/views/inc/header.php'; ?>
<section class="content">
	<div class="category">
		<h2>Каталог</h2>
		<nav>
			<ul>
				<?php foreach($categories as $category): ?>
					<li>
						<a class="<?php if($category['id'] == $categoryId) echo 'active';?>" href="/category/<?=$category['id']?>">
							<?=$category['name'];?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
	<div class="products-block">
		<h2><?=$currentCategory;?></h2>
		<div class="products">
			<?php foreach($categoryProducts as $product):?>
				<div class="product">
					<!-- <img src="/template/images/mobile/1.jpg"> -->
					<img src="<?=Product::getImage($product['id']);?>">

					<h2>$<?=$product['price']?></h2>
					<p><a href="/product/<?=$product['id']?>"><?=$product['name']?></a></p>
					<a class="add-to-cart" data-id="<?=$product['id'];?>">В корзину</a>
				</div>
			<?php endforeach; ?>
		</div>
		<?php echo $pagination->get();?>
	</div>
	<?php include ROOT . '/views/inc/footer.php' ?>