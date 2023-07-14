<div class="menu-custom">
    <div class="wrap-content dflex align-items-center">
        <div class="category">
            <span class="title-category">DANH MỤC SẢN PHẨM <i class="fas fa-caret-right ml-2"></i></span>
            <div class="caterogy-table">
                <ul class="p-0 m-0 list-unstyled scrrol-view <?=($source == 'index' ? 'active-menu' : '')?>" id="box">
                    <?php foreach ($splist as $vlist): ?>
                        <li>
                            <a href="<?=$configBase?><?= $vlist['slug'] ?>" title="<?= $vlist['name'] ?>">
                                <span>
                                    <?= $vlist['name'] ?>
                                </span>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="menu">
            <ul class="dflex align-items-center">
                <li><a class="<?php if ($com == '')
                    echo 'active'; ?> transition" href="<?=$configBase?>" title="Trang chủ">Trang chủ</a></li>
                <li><a class="<?php if ($com == 'san-pham')
                    echo 'active'; ?> transition" href="<?=$configBase?>san-pham" title="Sản phẩm">Sản phẩm</a></li>
                <li><a class="<?php if ($com == 'huong-dan-mua-hang')
                    echo 'active'; ?> transition" href="<?=$configBase?>huong-dan-mua-hang" title="Hướng dẫn mua hàng">Hướng dẫn mua
                        hàng</a></li>
                <li><a class="<?php if ($com == 'tin-tuc')
                    echo 'active'; ?> transition" href="<?=$configBase?>tin-tuc" title="Tin tức">Tin tức</a></li>
                <li><a class="<?php if ($com == 'lien-he')
                    echo 'active'; ?> transition" href="<?=$configBase?>lien-he" title="Liên hệ">Liên hệ</a></li>
                <li class="ml-auto">
                    <div class="search w-clear">
                        <input type="text" id="keyword" placeholder="Tìm sản phẩm"
                            onkeypress="doEnter(event,'keyword');" />
                        <p onclick="onSearch('keyword');"></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>