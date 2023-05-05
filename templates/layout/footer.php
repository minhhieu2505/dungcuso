<div class="footer">
    <div class="footer-article">
        <div class="wrap-content">
            <div class="row">
                <div class="footer-news col-2">
                    <span>
                        <img src="upload/photo/<?= $logo['photo'] ?>" alt="">
                    </span>
                    <ul class="social social-header list-unstyled p-0 m-0 text-center">
                        <?php foreach ($social as $k => $v) { ?>
                            <li class="d-inline-block align-top mt-1 mr-1">
                                <a href="<?= $v['link'] ?>" target="_blank">
                                    <img src="upload/photo/<?= $v['photo'] ?>" alt="">
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-news col-3">
                    <h2 class="footer-title">
                        CTY TNHH DỊCH VỤ CÔNG NGHỆ ĐỨC KHANG
                    </h2>
                    <div class="footer-info content-ck">
                        <div class="items">
                            <p>
                                <i class="fa-sharp fa-solid fa-location-dot"></i>
                                <span>
                                    <?= $optsetting['address'] ?>
                                </span>
                            </p>
                        </div>
                        <div class="items">
                            <p>
                                <i class="fa-solid fa-phone"></i>
                                <span>
                                    <?= $optsetting['phone'] ?>
                                </span>
                            </p>
                        </div>
                        <div class="items">
                            <p>
                                <i class="fa-solid fa-envelope"></i>
                                <span>
                                    <?= $optsetting['email'] ?>
                                </span>
                            </p>
                        </div>
                        <div class="items">
                            <p>
                                <i class="fa-solid fa-globe"></i>
                                <span>
                                    <?= $optsetting['website'] ?>
                                </span>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="footer-news col-2">
                    <h2 class="footer-title">Chính sách</h2>
                    <ul class="footer-ul">
                        <?php foreach ($policy as $v) { ?>
                            <li><a href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>"><?= $v['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-news col-2">
                    <h2 class="footer-title">Danh mục</h2>
                    <ul class="footer-ul">
                        <li><a href="san-pham-ban-chay" title="Sản phẩm bán chạy">Sản phẩm bán chạy</a></li>
                        <li><a href="huong-dan-mua-hang" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a></li>
                        <li><a href="tin-tuc" title="Tin tức">Tin tức</a></li>
                        <li><a href="lien-he" title="Liên hệ">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="footer-news col-3">
                    <h2 class="footer-title">Fanpage facebook</h2>
                    <div id="fanpage-fb">
                        <div class="fb-page" data-href="<?= $optsetting['fanpage'] ?>" data-tabs="timeline"
                            data-width="300" data-height="200" data-small-header="true"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="<?= $optsetting['fanpage'] ?>">
                                    <a href="<?= $optsetting['fanpage'] ?>"></a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered">
    </div>

    
<!-- Modal cart -->
<div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="popup-cart-label">Giỏ hàng của bạn</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>


<div class="btn-opencart"><i class="fa-solid fa-cart-shopping"></i></div>