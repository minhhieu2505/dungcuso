<div class="title-main"><span><?= $titleMain ?></span></div>
<div class="content-main">
    <div class="contact-article row">
        <div class="contact-text content-ck col-lg-6"><?= htmlspecialchars_decode($lienhe['content' . $lang]) ?></div>
        <form id="FormContact" class="contact-form validation-contact col-lg-6" novalidate method="post" action="" enctype="multipart/form-data">
            <div class="form-row row">
                <div class="contact-input col-sm-6">
                    <input type="text" class="form-control text-sm" id="fullname-contact" name="dataContact[fullname]" placeholder="Họ tên" value="<?= $flash->get('fullname') ?>" required />
                </div>
                <div class="contact-input col-sm-6">
                    <input type="number" class="form-control text-sm" id="phone-contact" name="dataContact[phone]" placeholder="Số điện thoại" value="<?= $flash->get('phone') ?>" required />
                </div>
            </div>
            <div class="form-row row">
                <div class="contact-input col-sm-6">
                    <input type="text" class="form-control text-sm" id="address-contact" name="dataContact[address]" placeholder="Địa chỉ" value="<?= $flash->get('address') ?>" required />
                </div>
                <div class="contact-input col-sm-6">
                    <input type="email" class="form-control text-sm" id="email-contact" name="dataContact[email]" placeholder="Email" value="<?= $flash->get('email') ?>" required />
                </div>
            </div>
            <div class="contact-input">
                <textarea class="form-control text-sm" id="content-contact" name="dataContact[content]" placeholder="Nội dung" required /><?= $flash->get('content') ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary mr-2" name="submit-contact" value="Gửi" disabled />
            <input type="reset" class="btn btn-secondary" value="Nhập lại" />
			<input type="hidden" name="contact" value="submit">
            <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
        </form>
    </div>
</div>