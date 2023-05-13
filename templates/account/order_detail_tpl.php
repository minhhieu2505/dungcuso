<div class="wrap-user">
    
    <div class="title-user">
        <span><?=$titleMain?></span>
    </div>
    <div class="d-flex justify-content-between align-items-start">
    <div class="box-user">
    <div class="items-info"><a href="thong-tin-ca-nhan" class="<?=$action=='thong-tin-ca-nhan' ? 'act' : ''?>">Thông tin cá nhân</a></div>
    <div class="items-info"><a href="don-hang-cua-ban" class="act">Đơn hàng của bạn</a></div>
    <div class="items-info"><a href="doi-mat-khau">Đổi mật khẩu</a></div>
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
    <?php foreach ($order_detail as $key => $v) { 
        $product_items = $d->rawQueryOne("select * from `product` where id = ".$v['id_product']); 
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
  </tbody>
</table>
</div>
    </div>
</div>