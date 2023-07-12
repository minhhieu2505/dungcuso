<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Liên hệ</a>
            </li>
        </ol>
    </div>
</nav>
<div class="title-main"><span><?= $titleMain ?></span></div>
<div class="content-main">
    <div class="contact-article row">
        
        <div class="contact-text content-ck col-lg-12"><?= htmlspecialchars_decode($lienhe['content' . $lang]) ?>
            <p>
                <strong>
                    <span style="color:#e74c3c">
                    <?= $optsetting['name'] ?>
                    </span>
                </strong>
            </p>

            <label for="address">Địa chỉ:</label>
            <span><?= $optsetting['address'] ?></span> <br>
            <label for="phone">Số điện thoại:</label>
            <span><?= $optsetting['phone'] ?></span> <br>
            <label for="hotlinee">Hotline:</label>
            <span><?= $optsetting['hotline'] ?></span> <br>
            <label for="email">Email:</label>
            <span><?= $optsetting['email'] ?></span>

            <div class="grid-social">
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/email-icon.png" alt=""></i>
                    <p>E-mail</p>
                    <a href="<?= $optsetting['email'] ?>"><?= $optsetting['email'] ?></a>
                </div>
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/icons-phone.png" alt=""></i>
                    <p>Phone</p>
                    <a href="<?= $optsetting['phone'] ?>"><?= $optsetting['phone'] ?></a>
                </div>
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/zalo-logo.png" alt=""></i>
                    <p>Zalo</p>
                    <a href="<?= $optsetting['zalo'] ?>"><?= $optsetting['zalo'] ?></a>
                </div>
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/messenger.png" alt=""></i>
                    <p>Messenger</p>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
</div>