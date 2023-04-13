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
                        <?= $footer['namevi'] ?>
                    </h2>
                    <div class="footer-info content-ck">
                        <?= htmlspecialchars_decode($footer['contentvi']) ?>
                    </div>

                </div>
                <div class="footer-news col-2">
                    <h2 class="footer-title">Chính sách</h2>
                    <ul class="footer-ul">
                        <?php foreach ($policy as $v) { ?>
                            <li><a href="<?= $v['slugvi'] ?>" title="<?= $v['namevi'] ?>"><?= $v['namevi'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-news col-2">
                    <h2 class="footer-title">Danh mục</h2>
                    <ul class="footer-ul">
                        <li><a href="thuong-hieu" title="Thương hiệu">Thương hiệu</a></li>
                        <li><a href="khuyen-mai" title="Khuyến mãi">Khuyến mãi</a></li>
                        <li><a href="san-pham-moi" title="Sản phẩm mới">Sản phẩm mới</a></li>
                        <li><a href="huong-dan-mua-hang" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a></li>
                        <li><a href="kinh-nghiem" title="Kinh nghiệm">Kinh nghiệm</a></li>
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
                                    <a href="<?= $optsetting['fanpage'] ?>">Facebook</a>
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