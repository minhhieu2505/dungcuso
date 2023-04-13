<!-- Tiêu chí -->
<?php if ($criteria): ?>
	<div class="criteria">
		<div class="wrap-content">
			<div class="slick-criteria">
				<?php foreach ($criteria as $v): ?>
					<div>
						<div class="items dflex">
							<div class="img">
								<img src="upload/photo/<?=$v['photo']?>" alt="" width="80" height="80">
							</div>
							<div class="info">
								<p class="name text-split-1"><?=$v['name']?></p>
								<span class="desc text-split-1"><?=$v['description']?></span>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>

<?php if ($advertise): ?>
	<div class="advertise-index">
		<div class="wrap-content">
			<div class="slick-advertise">
				<?php foreach ($advertise as $v): ?>
					<div>
						<div class="items">
							<a href="<?=$v['link']?>" class="scale-img" title="<?=$v['name']?>">
								<img src="upload/photo/<?=$v['photo']?>" alt="" width="640" height="230">
							</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Bestseller -->
<?php if ($bestseller): ?>
	<div class="bestseller">
		<div class="wrap-content">
			<div class="box">
				<div class="title-seller"><span>SẢN PHẨM BÁN CHẠY</span></div>
				<div class="box-bestseller">
					<div class="slick-bestseller">
						<?php foreach ($bestseller as $key => $v) {                
							?>        
							<div class="">
								<div class="product">
									<div class="box-product" >
										<a href="<?=$v['slug']?>" class="pic-product scale-img">
											<img src="upload/product/<?=$v['photo']?>" alt="" width="600" height="600"> 
										</a>
										<div class="info-product">
											<h3 class="name-product"><a href="<?=$v['slug']?>" class="text-decoration-none text-split2"><?=$v['name']?></a></h3>
											<div class="dflex align-items-center ">
												<p class="price-product">
													<?php if($v['discount']) { ?>
														<span class="price-new"><?=$v['sale_price']?> đ</span><br>
														<span class="price-old"><?=$v['regular_price']?> đ</span>
														<span class="price-per"><?='-'.$v['discount'].'%'?></span>
													<?php } else { ?>
														<span class="price-new">
															<?php if($v['regular_price']) { 
																$v['regular_price']; }
																else { ?>
																	<span><a href="tel:<?=$optsetting['hotline']?>" class="text-dark">Liên hệ</a></span>
																<?php }
															?></span>
														<?php } ?>
													</p>
													<div class="product-cart"><a class = "addcart" data-id="<?=$v['id']?>" data-action="addnow"><i class="fas fa-shopping-cart"></i></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>


<!-- Promotion -->
<?php if ($promotion): ?>
	<div class="promotion">
		<div class="wrap-content">
			<div class="title-index">
				<span>Sản phẩm khuyến mãi</span>
				<a href="khuyen-mai" class="see-all">Xem tất cả</a>
			</div>
			<div class="box">
				<div class="box-promotion">
					<div class="slick-product">
						<?php foreach ($promotion as $key => $v) {                
							?>        
							<div class="">
								<div class="product">
									<div class="box-product" >
										<a href="<?=$v['slug']?>" class="pic-product scale-img">
											<img src="upload/product/<?=$v['photo']?>" alt="" width="600" height="600"> 
										</a>
										<div class="info-product">
											<h3 class="name-product"><a href="<?=$v['slug']?>" class="text-decoration-none text-split2"><?=$v['name']?></a></h3>
											<div class="dflex align-items-center ">
												<p class="price-product">
													<?php if($v['discount']) { ?>
														<span class="price-new"><?=$v['sale_price']?> đ</span><br>
														<span class="price-old"><?=$v['regular_price']?> đ</span>
														<span class="price-per"><?='-'.$v['discount'].'%'?></span>
													<?php } else { ?>
														<span class="price-new">
															<?php if($v['regular_price']) { 
																$v['regular_price']; }
																else { ?>
																	<span><a href="tel:<?=$optsetting['hotline']?>" class="text-dark">Liên hệ</a></span>
																<?php }
															?></span>
														<?php } ?>
													</p>
													<div class="product-cart"><a class = "addcart" data-id="<?=$v['id']?>" data-action="addnow"><i class="fas fa-shopping-cart"></i></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Product Hot -->
<?php if ($producthot): ?>
	<div class="producthot">
		<div class="wrap-content">
			<div class="title-index">
				<span>khuyến mãi hot mỗi ngày</span>
				<a href="san-pham-hot" class="see-all">Xem tất cả</a>
			</div>
			<div class="box">
				<div class="box-producthot">
					<div class="slick-product">
						<?php foreach ($producthot as $key => $v) {                
							?>        
							<div class="">
								<div class="product">
									<div class="box-product" >
										<a href="<?=$v['slug']?>" class="pic-product scale-img">
											<img src="upload/product/<?=$v['photo']?>" alt="" width="600" height="600"> 
										</a>
										<div class="info-product">
											<h3 class="name-product"><a href="<?=$v['slug']?>" class="text-decoration-none text-split2"><?=$v['name']?></a></h3>
											<div class="dflex align-items-center ">
												<p class="price-product">
													<?php if($v['discount']) { ?>
														<span class="price-new"><?=$v['sale_price']?> đ</span><br>
														<span class="price-old"><?=$v['regular_price']?> đ</span>
														<span class="price-per"><?='-'.$v['discount'].'%'?></span>
													<?php } else { ?>
														<span class="price-new">
															<?php if($v['regular_price']) { 
																$v['regular_price']; }
																else { ?>
																	<span><a href="tel:<?=$optsetting['hotline']?>" class="text-dark">Liên hệ</a></span>
																<?php }
															?></span>
														<?php } ?>
													</p>
													<div class="product-cart"><a class = "addcart" data-id="<?=$v['id']?>" data-action="addnow"><i class="fas fa-shopping-cart"></i></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>


<?php /* 
Criteria

<?php if ($advertise): ?>
	<div class="advertise-index">
		<div class="wrap-content">
			<div class="slick-advertise">
				<?php foreach ($advertise as $v): ?>
					<div>
						<div class="items">
							<a href="<?=$v['link']?>" class="scale-img" title="<?=$v['name']?>">
								<img src="upload/photo/<?=$v['photo']?>" alt="" width="640" height="230">
							</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>




<!-- Brand -->
<?php if ($brand): ?>
	<div class="brand-index">
		<div class="wrap-content">
			<div class="box2">
				<div class="title-box"><span>THƯƠNG HIỆU NỔI BẬT</span></div>
				<div class="box-brand">
					<div class="slick-brand">
						<?php foreach ($brand as $v): ?>
							<div>
								<a href="<?=$v['slug']?>" class="items">
									<img src="upload/product/<?=$v['photo']?>" alt="" width="200" height="85">
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>


<!-- Exp && Question -->
<div class="wrap-content dflex mb-4">
	<?php if ($newsnb): ?>
		<div class="news-index">
			<div class="title-news"><span>TIN TỨC / KINH NGHIỆM HAY</span><p></p></div>
			<div class="box-news row mg-10">
				<?php foreach ($newsnb as $v): ?>
					<div class="col-md-6 pd-10">
						<div class="row mg-7 mb-3">
							<div class="col-6 pd-7">
								<a href="<?=$v['slug']?>" title="<?=$v['name']?>" class="scale-img">
									<img src="upload/news/<?=$v['photo']?>" alt="" width="185" height="210">
								</a>
							</div>
							<div class="col-6 pd-7">
								<h3 class="news-name"><a href="<?=$v['slug']?>" title="<?=$v['name']?>" class="text-split2">
									<?=$v['name']?>
								</a></h3>
								<span class="news-desc text-split"><?=$v['descvi']?></span>
								<p class="news-time mb-0"><?=date("d/m/Y",$v['date_created'])?></p>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>
	<?php if ($question): ?>
		<div class="question">
			<div class="title-news"><span>CÂU HỎI THƯỜNG GẶP</span><p></p></div>
			<?php foreach ($question as $v): ?>
				<div class="items-question dflex align-items-center">
					<div class="img">
						<a href="<?=$v['slug']?>" title="<?=$v['name']?>">
							<img src="upload/news/<?=$v['photo']?>" alt="" width="60" height="50">
						</a>
					</div>
					<h3><a href="<?=$v['slug']?>" title="<?=$v['name']?>" class="text-split2"><?=$v['name']?></a>
						
					</h3>
				</div>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>
*/ ?>