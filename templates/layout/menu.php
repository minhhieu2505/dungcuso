<div class="menu-custom">
    <div class="wrap-content dflex align-items-center">
        <div class="category">
            <span class="title-category">DANH MỤC SẢN PHẨM <i class="fas fa-caret-right ml-2"></i></span>
            <div class="caterogy-table">
                <ul class="p-0 m-0 list-unstyled scrrol-view active-menu" id="box">
                    <?php foreach ($splist as $vlist): ?>
                        <li>
                            <a href="<?= $vlist['slug'] ?>" title="<?= $vlist['name'] ?>">
                                <span>
                                    <?= $vlist['name'] ?>
                                </span>
                                <?php if ($spcat): ?><i class="fas fa-angle-right"></i>
                                <?php endif ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="menu">
            <ul class="dflex align-items-center">
                <li><a class="<?php if ($com == '')
                    echo 'active'; ?> transition" href="index.php" title="Trang chủ">Trang chủ</a></li>
                <li><a class="<?php if ($com == 'san-pham-ban-chay')
                    echo 'active'; ?> transition" href="san-pham-ban-chay" title="Sản phẩm bán chạy">Sản phẩm bán chạy</a></li>
                <li><a class="<?php if ($com == 'huong-dan-mua-hang')
                    echo 'active'; ?> transition" href="huong-dan-mua-hang" title="Hướng dẫn mua hàng">Hướng dẫn mua
                        hàng</a></li>
                <li><a class="<?php if ($com == 'tin-tuc')
                    echo 'active'; ?> transition" href="tin-tuc" title="Tin tức">Tin tức</a></li>
                <li><a class="<?php if ($com == 'lien-he')
                    echo 'active'; ?> transition" href="lien-he" title="Liên hệ">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>