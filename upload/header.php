<div class="header">
	<div class="wrap-content dflex align-items-center">
		<a href="">
			<?=$func->getImage(['class' => '', 'sizes' => '200x75x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name'.$lang]])?>
		</a>
		<div class="search w-clear">
			<input type="text" id="keyword" placeholder="Tìm sản phẩm" onkeypress="doEnter(event,'keyword');"/>
			<p onclick="onSearch('keyword');"></p>
		</div>
		<div class="icon-product-list">
			<?php foreach ($procatnb as $vlist): ?>
				<div class="items">
					<div class="img">
						<a href="<?=$vlist[$sluglang]?>" title="<?=$vlist['name'.$lang]?>">
							<?=$func->getImage(['class' => '', 'sizes' => '45x45x2', 'upload' => UPLOAD_PRODUCT_L, 'image' => $vlist['icon'], 'alt' => $vlist['name'.$lang]])?>
						</a>
					</div>
					<h3 class="name"><a href="<?=$vlist[$sluglang]?>" title="<?=$vlist['name'.$lang]?>">
						<?=$vlist['name'.$lang]?>
					</a></h3>
				</div>
			<?php endforeach ?>
		</div>
		<div class="icon-quote">
			<a href="lien-he">
				<i><?=$func->getImage(['size-error' => '45x45x2', 'upload' => 'assets/images/', 'image' => 'icon-baogia.png', 'alt' => 'Báo giá'])?></i>
				<span>Báo giá</span>
			</a>
		</div>
		<div class="line-header"></div>
		<div class="hotline-header">
			<span><?=$optsetting['hotline']?></span><br>
			<span><?=$optsetting['phone']?></span>
		</div>
		<div class="line-header"></div>
		<?php if(array_key_exists($loginMember, $_SESSION) && $_SESSION[$loginMember]['active'] == true) { ?>
			<div class="user-header">
				<a href="account/thong-tin">
					<span>Hi, <?=$_SESSION[$loginMember]['username']?></span>
				</a> <br>
				<a href="account/dang-xuat">
					<i class="fas fa-sign-out-alt"></i>
					<span><?=dangxuat?></span>
				</a>
			</div>
		<?php } else { ?>
			<div class="icon-account">
				<a href="account/dang-nhap">
					<i><?=$func->getImage(['size-error' => '45x45x2', 'upload' => 'assets/images/', 'image' => 'icon-login.png', 'alt' => 'Tài khoản'])?></i>
				</a>
			</div>
		<?php } ?>
		<div class="line-header"></div>
		<div class="cart-header">
			<a href="gio-hang">
				<i><?=$func->getImage(['size-error' => '45x45x2', 'upload' => 'assets/images/', 'image' => 'icon-cart.png', 'alt' => 'Giỏ hàng'])?></i>
				<span class="count-cart"><?=(!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0?></span>
			</a>
		</div>
	</div>
</div>