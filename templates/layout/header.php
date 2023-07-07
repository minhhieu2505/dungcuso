<div class="header">
	<div class="wrap-content dflex align-items-center">
		<a href="<?=$configBase?>">
			<img src="<?=$configBase?>upload/photo/<?= $logo['photo'] ?>" alt="" width="200" height="75">
		</a>
		<div class="address-header">
			<div class="icon-hd">
				<i class="fa-sharp fa-solid fa-location-dot"></i>
			</div>
			<span>
				<?= $optsetting['address'] ?>
			</span>
		</div>
		<div class="address-header">
			<div class="icon-hd">
				<i class="fa-solid fa-envelope"></i>
			</div>
			<div>
				<p class="mb-0">Email:</p>
				<span>
					<?= $optsetting['email'] ?>
				</span>
			</div>
		</div>
		<div class="address-header">
			<div class="icon-hd">
				<i class="fa-solid fa-phone"></i>
			</div>
			<div>
				<span>
					<?= $optsetting['hotline'] ?>
				</span> <br>
				<span>
					<?= $optsetting['phone'] ?>
				</span>
			</div>
		</div>
		<div class="cart-header">
			<a href="<?=$configBase?>gio-hang">
			<div class="icon-hd">
					<i class="fa-solid fa-cart-shopping"></i>
				</div>
				<span class="count-cart">0</span>
			</a>
		</div>
		<div class="cart-header">
			
			<?php if (!empty($_SESSION[$loginMember]) && $_SESSION[$loginMember]['active'] == true) { ?>
				<p class="title-login"><a class="" href="<?=$configBase?>account/thong-tin-ca-nhan"> Xin chào, <?=$_SESSION[$loginMember]['fullname']?></a></p>
			<?php } else { ?>
			<a href="<?=$configBase?>account/dang-nhap">
				<div class="icon-hd">
				<i class="fa-solid fa-user"></i>
				</div>
			</a>
			<?php } ?>
		</div>
	</div>
</div>