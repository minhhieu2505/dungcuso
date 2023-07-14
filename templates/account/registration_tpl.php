<div class="wrap-user wrap-chill">
        <div class=" title-user">
            <span>ĐĂNG KÝ</span>
            
        </div>
        <?=$flash->getMessages("frontend")?>
        <form action="" method="post" class="register-form">
            <div class="form-group mb-3">
            
            <label class="label" for="name">Tên tài khoản *</label>
                <input type="text" class="form-control text-sm" id="username" name="username" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập tài khoản hoặc địa chỉ email</div> 
            </div>
            <div class="form-group mb-3">
            <label class="label" for="name">Mật khẩu (Tối thiểu 6 ký tự) *</label>
                <input type="password" class="form-control text-sm" id="password" name="password" pattern=".{6,}" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập mật khẩu</div> 
            </div>
            <div class="form-group mb-3">
            <label class="label" for="name">Nhập lại mật khẩu (Tối thiểu 6 ký tự) *</label>
                <input type="password" class="form-control text-sm" id="repassword" name="repassword" pattern=".{6,}" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập mật khẩu</div> 
            </div>
            <div class="form-group mb-3">
            <label class="label" for="name">HỌ TÊN *</label>
                <input type="text" class="form-control text-sm" id="fullname" name="fullname" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập họ tên</div> 
            </div>

            <div class="form-group mb-3">
            <label class="label" for="name">SỐ ĐIỆN THOẠI *</label>
                <input type="number" class="form-control text-sm" id="phone" name="phone" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div> 
            </div>
            <div class="form-group mb-3">
            <label class="label" for="name">ĐỊA CHỈ *</label>
                <input type="text" class="form-control text-sm" id="address" name="address" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập địa chỉ</div> 
            </div>
            <div class="form-group mb-3">
            <label class="label" for="name">EMAIL *</label>
                <input type="email" class="form-control text-sm" id="email" name="email" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập email</div> 
            </div>
            <div class="button-user d-flex align-items-center justify-content-between">
                <button type="submit" class="btn form-control btn-primary rounded submit px-3" name="register-user" value="1">Đăng ký</button>
            </div>
        </form>
    </div>