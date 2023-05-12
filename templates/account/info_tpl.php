<div class="wrap-user">
    <div class="title-user">
        <span><?= thongtincanhan ?></span>
    </div>
    <form class="form-user validation-user" novalidate method="post" action="account/thong-tin" enctype="multipart/form-data">
        <?= $flash->getMessages("frontend") ?>
        <label><?= hoten ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input type="text" class="form-control text-sm" id="fullname" name="fullname" placeholder="<?= nhaphoten ?>" value="<?= (!empty($flash->has('fullname'))) ? $flash->get('fullname') : $rowDetail['fullname'] ?>" required>
            <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
        </div>
        <label><?= taikhoan ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input type="text" class="form-control text-sm" id="username" name="username" placeholder="<?= nhaptaikhoan ?>" value="<?= $rowDetail['username'] ?>" readonly required>
        </div>
        <label><?= matkhaucu ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="password" class="form-control text-sm" id="old-password" name="old-password" placeholder="<?= nhapmatkhaucu ?>">
        </div>
        <label><?= matkhaumoi ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="password" class="form-control text-sm" id="new-password" name="new-password" placeholder="<?= nhapmatkhaumoi ?>">
        </div>
        <label><?= nhaplaimatkhaumoi ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="password" class="form-control text-sm" id="new-password-confirm" name="new-password-confirm" placeholder="<?= nhaplaimatkhaumoi ?>">
        </div>
        <label><?= gioitinh ?></label>
        <div class="input-group input-user">
            <?php $flashGender = $flash->get('gender'); ?>
            <div class="radio-user custom-control custom-radio">
                <input type="radio" id="nam" name="gender" class="custom-control-input" <?= (!empty($flashGender) && $flashGender == 1) ? 'checked' : (($rowDetail['gender'] == 1) ? 'checked' : '') ?> value="1" required>
                <label class="custom-control-label" for="nam"><?= nam ?></label>
            </div>
            <div class="radio-user custom-control custom-radio">
                <input type="radio" id="nu" name="gender" class="custom-control-input" <?= (!empty($flashGender) && $flashGender == 2) ? 'checked' : (($rowDetail['gender'] == 2) ? 'checked' : '') ?> value="2" required>
                <label class="custom-control-label" for="nu"><?= nu ?></label>
            </div>
        </div>
        <label><?= ngaysinh ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="text" class="form-control text-sm" id="birthday" name="birthday" placeholder="<?= nhapngaysinh ?>" value="<?= (!empty($flash->has('birthday'))) ? $flash->get('birthday') : date("d/m/Y", $rowDetail['birthday']) ?>" required autocomplete="off">
            <div class="invalid-feedback"><?= vuilongnhapngaysinh ?></div>
        </div>
        <label>Email</label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-envelope"></i></div>
            </div>
            <input type="email" class="form-control text-sm" id="email" name="email" placeholder="<?= nhapemail ?>" value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : $rowDetail['email'] ?>" required>
            <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
        </div>
        <label><?= dienthoai ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-phone-square"></i></div>
            </div>
            <input type="number" class="form-control text-sm" id="phone" name="phone" placeholder="<?= nhapdienthoai ?>" value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : $rowDetail['phone'] ?>" required>
            <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
        </div>
        <label><?= diachi ?></label>
        <div class="input-group input-user">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-map"></i></div>
            </div>
            <input type="text" class="form-control text-sm" id="address" name="address" placeholder="<?= nhapdiachi ?>" value="<?= (!empty($flash->has('address'))) ? $flash->get('address') : $rowDetail['address'] ?>" required>
            <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
        </div>
        <div class="button-user">
            <input type="submit" class="btn btn-primary btn-block" name="info-user" value="<?= capnhat ?>" disabled>
        </div>
    </form>
</div>