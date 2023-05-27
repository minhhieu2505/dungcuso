<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="don-hang-cua-ban">Đơn hàng của bạn</a>
            </li>
        </ol>
    </div>
</nav>
<div class="wrap-user">
    
    <div class="title-user">
        <span><?=$titleMain?></span>
    </div>
    <div class="d-flex justify-content-between align-items-start">
    <div class="box-user">
    <div class="items-info"><a href="thong-tin-ca-nhan" class="<?=$action=='thong-tin-ca-nhan' ? 'act' : ''?>">Thông tin cá nhân</a></div>
    <div class="items-info"><a href="don-hang-cua-ban" class="act">Đơn hàng của bạn</a></div>
    <div class="items-info"><a href="doi-mat-khau" class="<?=$action=='doi-mat-khau' ? 'act' : ''?>">Đổi mật khẩu</a></div>
    <div class="items-info"><a href="dang-xuat">Đăng xuất</a></div>
</div>
<div class="box-info">
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá tiền</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Thành tiền</th>
    </tr>
  </thead>
  <tbody>
    <?php $temp = 0 ; foreach ($order_detail as $key => $v) { 
        $product_items = $d->rawQueryOne("select * from `product` where id = ".$v['id_product']); 
        $temp += $product_items['sale_price'] * $v['quantity'] ;
    ?>
        <tr>
            <th scope="row"><?=$key+1?></th>
            <td style="width:30%;"><?=$product_items['name']?></td>
            <td style="max-width:80px;"><a href="<?=$configBase.$product_items['slug']?>"><img src="../upload/product/<?=$product_items['photo']?>" width="80" height="80" alt=""></a></td>
            <td><?=$func->formatMoney($product_items['sale_price'])?></td>
            <td><?=$v['quantity']?></td>
            <td><?=$func->formatMoney($product_items['sale_price'] * $v['quantity']);?></td>
        </tr>
    <?php } ?>
    <tr>
    <td colspan="6" class="text-end"><b class="text-danger">Tổng giá trị đơn hàng:</b> <?=$func->formatMoney($temp)?></td>
  </tr>
</table>
</div>
    </div>
</div>