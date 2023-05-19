<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="doi-mat-khau">Đổi mật khẩu</a>
            </li>
        </ol>
    </div>
</nav>
<div class="wrap-user">
    
    <div class="title-user">
        <span>Đổi mật khẩu</span>
    </div>
    <div class="d-flex justify-content-between align-items-start">
    <div class="box-user">
    <div class="items-info"><a href="thong-tin-ca-nhan" class="<?=$action=='thong-tin-ca-nhan' ? 'act' : ''?>">Thông tin cá nhân</a></div>
    <div class="items-info"><a href="don-hang-cua-ban" class="<?=$action=='don-hang-cua-ban' ? 'act' : ''?>">Đơn hàng của bạn</a></div>
    <div class="items-info"><a href="doi-mat-khau" class="<?=$action=='doi-mat-khau' ? 'act' : ''?>">Đổi mật khẩu</a></div>
    <div class="items-info"><a href="dang-xuat">Đăng xuất</a></div>
</div>
<div class="box-info">
    <form class="form-user validation-user" novalidate method="post" action="" enctype="multipart/form-data">
        <?= $flash->getMessages("frontend") ?>
        <label>Mật khẩu cũ</label>
        <div class="input-group input-user">
            <input type="password" class="form-control text-sm" id="password" name="password" placeholder="" value="" required>
        </div>
        <label>Mật khẩu mới</label>
        <div class="input-group input-user">
            <input type="password" class="form-control text-sm" id="password" name="password" placeholder="" value="" required>
        </div>
        <label>Nhập lại mật khẩu mới</label>
        <div class="input-group input-user">
            <input type="password" class="form-control text-sm" id="password" name="password" placeholder="" value="" required>
        </div>
        <div class="button-user">
            <input type="submit" class="btn btn-primary btn-block" name="info-user" value="Cập nhật">
        </div>
    </form>
</div>
    </div>
</div>