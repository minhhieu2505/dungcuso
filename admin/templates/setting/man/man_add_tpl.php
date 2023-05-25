<?php
$linkSave = "index.php?source=setting&act=save";
$options = (isset($item['options']) && $item['options'] != '') ? json_decode($item['options'], true) : null;
?>
<!-- Content Header -->
<section class="content-header text-sm">
	<div class="container-fluid">
		<div class="row">
			<ol class="breadcrumb float-sm-left">
				<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
				<li class="breadcrumb-item active">Thông tin công ty</li>
			</ol>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
		<div class="card-footer text-sm sticky-top">
			<button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
					class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
				lại</button>
		</div>

		<?= $flash->getMessages('admin') ?>

		<div class="card card-primary card-outline text-sm">
			<div class="card-header">
				<h3 class="card-title">Thông tin chung</h3>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="form-group col-md-4 col-sm-6">
						<label for="name">Tên công ty:</label>
						<input type="text" class="form-control text-sm" name="data[options][name]" id="name"
							placeholder="Địa chỉ"
							value="<?= (!empty($flash->has('name'))) ? $flash->get('name') : @$options['name'] ?>"
							required>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label for="address">Địa chỉ:</label>
						<input type="text" class="form-control text-sm" name="data[options][address]" id="address"
							placeholder="Địa chỉ"
							value="<?= (!empty($flash->has('address'))) ? $flash->get('address') : @$options['address'] ?>"
							required>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label for="email">Email:</label>
						<input type="email" class="form-control text-sm" name="data[options][email]" id="email"
							placeholder="Email"
							value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : @$options['email'] ?>"
							required>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label for="hotline">Hotline:</label>
						<input type="text" class="form-control text-sm" name="data[options][hotline]" id="hotline"
							placeholder="Hotline"
							value="<?= (!empty($flash->has('hotline'))) ? $flash->get('hotline') : @$options['hotline'] ?>"
							required>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label for="phone">Điện thoại:</label>
						<input type="text" class="form-control text-sm" name="data[options][phone]" id="phone"
							placeholder="Điện thoại"
							value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : @$options['phone'] ?>"
							required>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label for="zalo">Zalo:</label>
						<input type="text" class="form-control text-sm" name="data[options][zalo]" id="zalo"
							placeholder="Zalo"
							value="<?= (!empty($flash->has('zalo'))) ? $flash->get('zalo') : @$options['zalo'] ?>">
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label for="website">Website:</label>
						<input type="text" class="form-control text-sm" name="data[options][website]" id="website"
							placeholder="Website"
							value="<?= (!empty($flash->has('website'))) ? $flash->get('website') : @$options['website'] ?>"
							required>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label for="fanpage">Fanpage:</label>
						<input type="text" class="form-control text-sm" name="data[options][fanpage]" id="fanpage"
							placeholder="Fanpage"
							value="<?= (!empty($flash->has('fanpage'))) ? $flash->get('fanpage') : @$options['fanpage'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="coords_iframe">
						<span>Tọa độ google map iframe:</span>
						<a class="text-sm font-weight-normal ml-1" href="https://www.google.com/maps" target="_blank"
							title="Lấy mã nhúng google map">(Lấy mã nhúng)</a>
					</label>
					<textarea class="form-control text-sm" name="data[options][coords_iframe]" id="coords_iframe"
						rows="5"
						placeholder="Tọa độ google map iframe"><?= htmlspecialchars_decode((!empty($flash->has('coords_iframe'))) ? $flash->get('coords_iframe') : @$options['coords_iframe']) ?></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer text-sm">
			<button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
					class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
				lại</button>
			<input type="hidden" name="id" value="<?= (isset($item['id']) && $item['id'] > 0) ? $item['id'] : '' ?>">
		</div>
	</form>
</section>