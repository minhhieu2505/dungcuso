<div class="header">
	<div class="wrap-content dflex align-items-center">
		<a href="index.php">
			<img src="upload/photo/<?= $logo['photo'] ?>" alt="" width="200" height="75">
		</a>
		<div class="search w-clear">
			<input type="text" id="keyword" placeholder="Tìm sản phẩm" onkeypress="doEnter(event,'keyword');" />
			<p onclick="onSearch('keyword');"></p>
		</div>
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
			<div class="icon-hd">
				<i class="fa-solid fa-cart-shopping"></i>
			</div>
			<span class="count-cart">0</span>
		</div>
	</div>
</div>