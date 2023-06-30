<?php
$linkMan = "index.php?source=order&act=man";
$linkSave = "index.php?source=order&act=save";
?>
<!-- Content Header -->
<section class="content-header text-sm">
	<div class="container-fluid">
		<div class="row">
			<ol class="breadcrumb float-sm-left">
				<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
				<li class="breadcrumb-item"><a href="<?= $linkMan ?>" title="Quản lý đơn hàng">Quản lý đơn hàng</a></li>
				<li class="breadcrumb-item active">Thông tin đơn hàng <span class="text-primary">#
						<?= $item['code'] ?>
					</span></li>
			</ol>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<form method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
		<div class="card-footer text-sm sticky-top">
			<button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
				lại</button>
			<a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i
					class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
		</div>
		<div class="card card-primary card-outline text-sm">
			<div class="card-header">
				<h3 class="card-title">Thông tin chính</h3>
			</div>
			<div class="card-body row">
				<div class="form-group col-md-4 col-sm-6">
					<label>Mã đơn hàng:</label>
					<p class="text-primary">
						<?= @$item['code'] ?>
					</p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Họ tên:</label>
					<p class="font-weight-bold text-uppercase text-success">
						<?= @$item['fullname'] ?>
					</p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Điện thoại:</label>
					<p>
						<?= @$item['phone'] ?>
					</p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Email:</label>
					<p>
						<?= @$item['email'] ?>
					</p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Địa chỉ:</label>
					<p>
						<?= @$item['address'] ?>
					</p>
				</div>
				<div class="form-group col-md-4 col-sm-6">
					<label>Ngày đặt:</label>
					<p>
						<?= date("h:i:s A - d/m/Y", @$item['date_created']) ?>
					</p>
				</div>
				<div class="form-group col-12">
					<label for="order_status" class="mr-2">Tình trạng:</label>
					<select name="data[order_status]" id="order_status" class="select2 w-100">
						<option value="">Chọn tình trạng</option>
						<option value="1" <?=(@$item['order_status'] == 1 ? 'selected' : '')?> >Mới Đặt</option>
						<option value="2" <?=(@$item['order_status'] == 2 ? 'selected' : '')?> >Đã Xác Nhận</option>
						<option value="3" <?=(@$item['order_status'] == 3 ? 'selected' : '')?> >Đã Giao</option>
						<option value="4" <?=(@$item['order_status'] == 4 ? 'selected' : '')?>>Đã Hủy</option>
					</select>
				</div>
				<div class="form-group col-12">
					<label for="notes">Ghi chú:</label>
					<textarea class="form-control text-sm" name="data[notes]" id="notes" rows="5" placeholder="Ghi chú"
						readonly><?= @$item['notes'] ?></textarea>
				</div>
			</div>
		</div>
		<div class="card card-primary card-outline text-sm">
			<div class="card-header">
				<h3 class="card-title">Chi tiết đơn hàng</h3>
			</div>
			<div class="card-body table-responsive p-0">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="align-middle text-center" width="10%">STT</th>
							<th class="align-middle">Hình ảnh</th>
							<th class="align-middle" style="width:30%">Tên sản phẩm</th>
							<th class="align-middle text-center">Đơn giá</th>
							<th class="align-middle text-right">Số lượng</th>
							<th class="align-middle text-right">Tạm tính</th>
						</tr>
					</thead>
					<?php if (empty($order_detail)) { ?>
						<tbody>
							<tr>
								<td colspan="100" class="text-center">Không có dữ liệu</td>
							</tr>
						</tbody>
					<?php } else { ?>
						<tbody>
							<?php foreach ($order_detail as $k => $v) { ?>
								<?php $item_product = $d->rawQueryOne("select name,sale_price,regular_price,photo from product where id = ? and find_in_set('hienthi',status) limit 0,1", array($v['id_product'])); ?>
								<tr>
									<td class="align-middle text-center">
										<?= ($k + 1) ?>
									</td>
									<td class="align-middle">
										<a title="<?= $item_product['name'] ?>">
											<img src="../upload/product/<?= $item_product['photo'] ?>" alt="" srcset=""
												width="80" height="80">
										</a>
									</td>
									<td class="align-middle">
										<p>
											<?= $item_product['name'] ?>
										</p>
									</td>
									<td class="align-middle text-center">
										<div class="price-cart-detail">
											<?php if ($item_product['sale_price']) { ?>
												<span class="price-new-cart-detail"><?= $func->formatMoney($item_product['sale_price']) ?></span>
												<span class="price-old-cart-detail"><?= $func->formatMoney($item_product['regular_price']) ?></span>
											<?php } else { ?>
												<span class="price-new-cart-detail"><?= $func->formatMoney($item_product['regular_price']) ?></span>
											<?php } ?>
										</div>
									</td>
									<td class="align-middle text-right">
										<?= $v['quantity'] ?>
									</td>
									<td class="align-middle text-right">
										<div class="price-cart-detail">
											<?php if ($item_product['sale_price']) { ?>
												<span class="price-new-cart-detail"><?= $func->formatMoney($item_product['sale_price'] * $v['quantity']) ?></span>
												<span class="price-old-cart-detail"><?= $func->formatMoney($item_product['regular_price'] * $v['quantity']) ?></span>
											<?php } else { ?>
												<span class="price-new-cart-detail"><?= $func->formatMoney($item_product['regular_price'] * $v['quantity']) ?></span>
											<?php } ?>
										</div>
									</td>
								</tr>
							<?php } ?>
							<tr>
								<td colspan="5" class="title-money-cart-detail">Tổng giá trị đơn hàng:</td>
								<td colspan="1" class="cast-money-cart-detail">
									<?= $func->formatMoney($item['total_price']) ?>
								</td>
							</tr>
						</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class="card-footer text-sm">
			<button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
				lại</button>
			<a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i
					class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
			<input type="hidden" name="id" value="<?= (isset($item['id']) && $item['id'] > 0) ? $item['id'] : '' ?>">
		</div>
	</form>
</section>