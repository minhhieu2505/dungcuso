<!-- Tiêu chí -->
<?php if (!empty($criteria)): ?>
	<div class="criteria">
		<div class="wrap-content">
			<div class="slick-criteria">
				<?php foreach ($criteria as $v): ?>
					<div>
						<div class="items dflex">
							<div class="img">
								<img src="upload/photo/<?= $v['photo'] ?>" alt="" width="80" height="80">
							</div>
							<div class="info">
								<p class="name text-split-1">
									<?= $v['name'] ?>
								</p>
								<span class="desc text-split-1">
									<?= $v['description'] ?>
								</span>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>

<?php if (!empty($advertise)): ?>
	<div class="advertise-index">
		<div class="wrap-content">
			<div class="slick-advertise">
				<?php foreach ($advertise as $v): ?>
					<div>
						<div class="items">
							<a href="<?= $v['link'] ?>" class="scale-img" title="<?= $v['name'] ?>">
								<img src="upload/photo/<?= $v['photo'] ?>" alt="" width="640" height="230">
							</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Bestseller -->
<?php if (!empty($bestseller)): ?>
	<div class="bestseller">
		<div class="wrap-content">
			<div class="box">
				<div class="title-seller"><span>SẢN PHẨM KHUYẾN MÃI</span></div>
				<div class="box-bestseller">
					<div class="slick-bestseller">
						<?php foreach ($bestseller as $key => $v) {
							?>
							<div class="">
								<div class="product">
									<div class="box-product">
										<a href="<?= $v['slug'] ?>" class="pic-product scale-img">
											<img src="upload/product/<?= $v['photo'] ?>" alt="" width="600" height="600">
										</a>
										<div class="info-product">
											<h3 class="name-product"><a href="<?= $v['slug'] ?>"
													class="text-decoration-none text-split2"><?= $v['name'] ?></a></h3>
											<div class="dflex align-items-center ">
												<p class="price-product">
													<?php if ($v['discount']) { ?>
														<span class="price-new">
															<?= $func->formatMoney($v['sale_price']); ?>
														</span><br>
														<span class="price-old">
															<?= $func->formatMoney($v['regular_price']); ?>
														</span>
														<span class="price-per">
															<?= '-' . $v['discount'] . '%' ?>
														</span>
													<?php } else { ?>
														<span class="price-new">
															<?php if ($v['regular_price']) { ?>
																<?= $func->formatMoney($v['regular_price']); ?>
															<?php } else { ?>
																<span><a href="tel:<?= $optsetting['hotline'] ?>" class="text-dark">Liên
																		hệ</a></span>
															<?php }
															?>
														</span>
													<?php } ?>
												</p>
												<div class="product-cart"><a class="addcart" data-id="<?= $v['id'] ?>"
														data-action="addnow"><i class="fas fa-shopping-cart"></i></a></div>
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
<?php if (!empty($producthot)): ?>
	<div class="producthot bestseller">
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
									<div class="box-product">
										<a href="<?= $v['slug'] ?>" class="pic-product scale-img">
											<img src="upload/product/<?= $v['photo'] ?>" alt="" width="600" height="600">
										</a>
										<div class="info-product">
											<h3 class="name-product"><a href="<?= $v['slug'] ?>"
													class="text-decoration-none text-split2"><?= $v['name'] ?></a></h3>
											<div class="dflex align-items-center ">
												<p class="price-product">
													<?php if ($v['discount']) { ?>
														<span class="price-new">
															<?= $func->formatMoney($v['sale_price']); ?>
														</span><br>
														<span class="price-old">
															<?= $func->formatMoney($v['regular_price']); ?>
														</span>
														<span class="price-per">
															<?= '-' . $v['discount'] . '%' ?>
														</span>
													<?php } else { ?>
														<span class="price-new">
															<?php if ($v['regular_price']) { ?>
																<?= $func->formatMoney($v['regular_price']); ?>
															<?php } else { ?>
																<span><a href="tel:<?= $optsetting['hotline'] ?>" class="text-dark">Liên
																		hệ</a></span>
															<?php }
															?>
														</span>
													<?php } ?>
												</p>
												<div class="product-cart"><a class="addcart" data-id="<?= $v['id'] ?>"
														data-action="addnow"><i class="fas fa-shopping-cart"></i></a></div>
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

<?php if (!empty($newsnb)): ?>
	<div class="news-index">
		<div class="wrap-content">
			<div class="title-news"><span>TIN TỨC / KINH NGHIỆM HAY</span></div>
			<div class="slick-news">
				<?php foreach ($newsnb as $v): ?>
					<div class="">
						<div class="items-newsnb">
							<div class="">
								<a href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>" class="scale-img">
									<img src="upload/news/<?= $v['photo'] ?>" alt="" width="185" height="210">
								</a>
							</div>
							<div class="">
								<h3 class="news-name"><a href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>" class="text-split2">
										<?= $v['name'] ?>
									</a></h3>
								<span class="news-desc text-split">
									<?= $v['description'] ?>
								</span>
							</div>
							<p class="news-time mb-0">
								<span>
									<?= date("d", $v['date_created']) ?>
								</span>
								<span>Th
									<?= date("m", $v['date_created']) ?>
								</span>
							</p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>
