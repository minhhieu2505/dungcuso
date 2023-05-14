<div class="wrap-user">
    
    <div class="title-user">
        <span><?=$titleMain?></span>
    </div>
    <div class="d-flex justify-content-between align-items-start">
    <div class="box-user">
    <div class="items-info"><a href="thong-tin-ca-nhan" class="<?=$action=='thong-tin-ca-nhan' ? 'act' : ''?>">Thông tin cá nhân</a></div>
    <div class="items-info"><a href="don-hang-cua-ban" class="<?=$action=='don-hang-cua-ban' ? 'act' : ''?>">Đơn hàng của bạn</a></div>
    <div class="items-info"><a href="doi-mat-khau">Đổi mật khẩu</a></div>
    <div class="items-info"><a href="dang-xuat">Đăng xuất</a></div>
</div>
<div class="box-info">
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Email</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Ngày đặt</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($order_user as $key => $v) { ?>
        <tr>
            <th scope="row"><?=$key+1?></th>
            <td><?=$v['code']?></td>
            <td><a href="chi-tiet-don-hang?id=<?=$v['id']?>"><?=$v['fullname']?></a></td>
            <td><?=$v['phone']?></td>
            <td><?=$v['address']?></td>
            <td><?=$v['email']?></td>
            <td><?=$func->formatMoney($v['total_price']);?></td>
            <td><?=date('d/m/Y',$v['total_price']);?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
</div>
    </div>
</div>