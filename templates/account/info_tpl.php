<div class="wrap-user">
    
    <div class="title-user">
        <span>Thông tin cá nhân</span>
    </div>
    <div class="d-flex justify-content-between align-items-start">
    <div class="box-user">
    <div class="items-info"><a href="thong-tin-ca-nhan" class="<?=$action=='thong-tin-ca-nhan' ? 'act' : ''?>">Thông tin cá nhân</a></div>
    <div class="items-info"><a href="don-hang-cua-ban" class="<?=$action=='don-hang-cua-ban' ? 'act' : ''?>">Đơn hàng của bạn</a></div>
    <div class="items-info"><a href="doi-mat-khau">Đổi mật khẩu</a></div>
    <div class="items-info"><a href="dang-xuat">Đăng xuất</a></div>
</div>
<div class="box-info">
    <form class="form-user validation-user" novalidate method="post" action="" enctype="multipart/form-data">
        <?= $flash->getMessages("frontend") ?>
        <label>Họ tên</label>
        <div class="input-group input-user">
            <input type="text" class="form-control text-sm" id="fullname" name="fullname" placeholder="" value="<?= (!empty($flash->has('fullname'))) ? $flash->get('fullname') : $rowDetail['fullname'] ?>" required>
        </div>
        <label>Tài khoản</label>
        <div class="input-group input-user">
            <input type="text" class="form-control text-sm" id="username" name="username" placeholder="" value="<?= $rowDetail['username'] ?>" readonly required>
        </div>
        <label>Email</label>
        <div class="input-group input-user">
            <input type="email" class="form-control text-sm" id="email" name="email" placeholder="" value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : $rowDetail['email'] ?>" required>
        </div>
        <label>Điện thoại</label>
        <div class="input-group input-user">
            <input type="number" class="form-control text-sm" id="phone" name="phone" placeholder="" value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : $rowDetail['phone'] ?>" required>
        </div>
        <label>Địa chỉ</label>
        <div class="input-group input-user">
            <input type="text" class="form-control text-sm" id="address" name="address" placeholder="" value="<?= (!empty($flash->has('address'))) ? $flash->get('address') : $rowDetail['address'] ?>" required>
        </div>
        <div class="button-user">
            <input type="submit" class="btn btn-primary btn-block" name="info-user" value="Cập nhật">
        </div>
    </form>
</div>
    </div>
</div>