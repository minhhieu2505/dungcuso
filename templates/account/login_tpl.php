<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Đăng nhập</a>
            </li>
        </ol>
    </div>
</nav>
<div class="wrap-main  w-clear row">
    <div class="wrap-user wrap-chill">
        <div class=" title-user">
            <span>ĐĂNG NHẬP</span>
            
        </div>
        <form action="" name="login-user" method="post" class="login-form">
            <div class="form-group mb-3">
            
            <label class="label" for="name">Tên tài khoản hoặc địa chỉ email *</label>
                <input type="text" class="form-control text-sm" id="username" name="username" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập tài khoản</div> 
            </div>
            <div class="form-group mb-3">
            <label class="label" for="name">Mật khẩu *</label>
                <input type="password" class="form-control text-sm" id="password" name="password" placeholder="" required="">
                    <div class="invalid-feedback">Vui lòng nhập mật khẩu</div> 
            </div>
            <div class="forget-password d-flex align-items-center justify-content-between">
                <a class="" href="dang-ky">Đăng ký</a>
                <a class="" href="#">Quên mật khẩu</a>
            </div>
            <div class="button-user d-flex align-items-center justify-content-between">
                <button type="submit" class="btn form-control btn-primary rounded submit px-3" name="login-user" value="1">Đăng nhập</button>
            </div>
            

        </form>
    </div>
</div>
