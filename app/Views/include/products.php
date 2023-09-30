<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Cool Stuff</span>
					<h2>Available Products</h2>
					<p>Come check out our latest deals and products only here in eMart!</p>
				</div>
			</div>
			<div class="row">
            <?php foreach ($products as $product): ?>
				<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url(<?= base_url() ?><?= $product['image'] ?>);">
							<div class="inner">
								<p>
									<a href="/view/<?= $product['id'] ?>" class="icon"><i class="icon-shopping-cart"></i></a>
									<a href="/view/<?= $product['id'] ?>" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href="single.html"><?= $product['name'] ?></a></h3>
							<span class="price">PRICE: $<?= $product['price'] ?></span><br>
						</div>
					</div>
				</div>
            <?php endforeach; ?>
			</div>
			


		</div>
    </div>
<div>
	