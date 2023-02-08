<!-- Criteria -->
<?php if ($criteria): ?>
	<div class="criteria">
		<div class="wrap-content">
			<div class="slick-criteria">
				<?php foreach ($criteria as $v): ?>
					<div>
						<div class="items dflex">
							<div class="img">
								<?=$func->getImage(['class' => '', 'sizes' => '80x80x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
							</div>
							<div class="info">
								<p class="name text-split-1"><?=$v['name'.$lang]?></p>
								<span class="desc text-split-1"><?=$v['desc'.$lang]?></span>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Advertise -->
<?php if ($advertise): ?>
	<div class="advertise-index">
		<div class="wrap-content">
			<div class="slick-advertise">
				<?php foreach ($advertise as $v): ?>
					<div>
						<div class="items">
							<a href="<?=$v['link']?>" title="<?=$v['name'.$lang]?>">
								<?=$func->getImage(['class' => 'w-100', 'sizes' => '640x320x1', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
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
						<?=$func->get_product_items($bestseller);?>
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
						<?=$func->get_product_items($promotion);?>
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
						<?=$func->get_product_items($producthot);?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Product Paging -->
<?php if ($splistnb): ?>
	<div class="product_index">
		<?php foreach ($splistnb as $klist => $vlist): 
			$productcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc",array($vlist['id']));
			$items = $d->rawQuery("select name$lang, slugvi, slugen, id, photo, regular_price, sale_price, discount from #_product where id_list = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc",array($vlist['id']));
		?>
			<div class="wrap-content wrap-product dflex">
				<div class="product_l-image">
					<a href="<?=$vlist[$sluglang]?>" class="items">
						<?=$func->getImage(['class' => '', 'sizes' => '310x495x1', 'upload' => UPLOAD_PRODUCT_L, 'image' => $vlist['photo'], 'alt' => $vlist['name'.$lang]])?>
					</a>
				</div> 
				<div class="product_l-table box-splist-<?=$vlist['id']?>">
					<div class="head-product">
						<div class="title-product dflex align-items-center <?=($klist % 2 == 0) ? "bg-1" : "bg-2"?>">
							<span data-list="<?=$vlist['id']?>" data-cat="" class="click-product"><?=$vlist['name'.$lang]?></span>
							<a href="<?=$vlist[$sluglang]?>" class="see-product">Xem tất cả <i class="fas fa-angle-right"></i></a>
						</div>
						<div class="menu-cat">
							<?php foreach ($productcat as $vcat): ?>
								<span class="click-product" data-list="<?=$vlist['id']?>" data-cat="<?=$vcat['id']?>"><?=$vcat['name'.$lang]?></span>
							<?php endforeach ?>
						</div>

					</div>
					<div class="box-paging box-paging-<?=$vlist['id']?>">
						<div class="slick-product2">
							<?=$func->get_product_items($items);?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
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
								<a href="<?=$v[$sluglang]?>" class="items">
									<?=$func->getImage(['class' => '', 'sizes' => '200x85x2', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- Category -->
<?php if ($category): ?>
	<div class="category-image">
		<div class="wrap-content">
			<div class="box2">
				<div class="title-box"><span>DANH MỤC NỔI BẬT</span></div>
				<div class="box-brand">
					<div class="slick-brand">
						<?php foreach ($category as $v): ?>
							<div>
								<a href="<?=$v['link']?>" tagret ="_blank" class="items">
									<?=$func->getImage(['class' => '', 'sizes' => '150x150x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
								</a>
								<h3 class="name-category"><a href="<?=$v['link']?>" class="text-split-1" title="<?=$v['name'.$lang]?>"><?=$v['name'.$lang]?></a></h3>
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
								<a href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>" class="scale-img">
									<?=$func->getImage(['class' => '', 'sizes' => '185x210x1', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
								</a>
							</div>
							<div class="col-6 pd-7">
								<h3 class="news-name"><a href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>" class="text-split2">
									<?=$v['name'.$lang]?>
								</a></h3>
								<span class="news-desc text-split"><?=$v['desc'.$lang]?></span>
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
						<a href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>">
							<?=$func->getImage(['class' => '', 'sizes' => '60x50x2', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
						</a>
					</div>
					<h3><a href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>" class="text-split2"><?=$v['name'.$lang]?></a>
						
					</h3>
				</div>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>