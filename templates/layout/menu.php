<div class="menu-custom">
    <div class="wrap-content dflex align-items-center">
        <div class="category">
            <span class="title-category">DANH MỤC SẢN PHẨM <i class="fas fa-caret-right ml-2"></i></span>
            <div class="caterogy-table">
                <ul class="p-0 m-0 list-unstyled scrrol-view active-menu" id="box">
                    <?php foreach ($splist as $vlist):
                        $spcat = $d->rawQuery("select namevi, slugvi, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id']));
                        ?>
                        <li>
                            <a href="<?= $vlist['slugvi'] ?>" title="<?= $vlist['namevi'] ?>">
                                <span>
                                    <?= $vlist['namevi'] ?>
                                </span>
                                <?php if ($spcat): ?><i class="fas fa-angle-right"></i>
                                <?php endif ?>
                            </a>
                            <?php if ($spcat): ?>

                            <?php endif ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="menu">
            <ul class="dflex align-items-center">
                <li><a class="<?php if ($com == 'khuyen-mai')
                    echo 'active'; ?> transition" href="khuyen-mai"
                        title="Khuyến mãi">Khuyến mãi</a></li>
                <li><a class="<?php if ($com == 'san-pham-moi')
                    echo 'active'; ?> transition" href="san-pham-moi"
                        title="Sản phẩm mới">Sản phẩm mới</a></li>
                <li><a class="<?php if ($com == 'huong-dan-mua-hang')
                    echo 'active'; ?> transition"
                        href="huong-dan-mua-hang" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a></li>
                <li><a class="<?php if ($com == 'kinh-nghiem')
                    echo 'active'; ?> transition" href="kinh-nghiem"
                        title="Kinh nghiệm">Kinh nghiệm</a></li>
                <li><a class="<?php if ($com == 'lien-he')
                    echo 'active'; ?> transition" href="lien-he"
                        title="Liên hệ">Liên hệ</a></li>
                <li>
                    <div class="search w-clear">
                        <input type="text" id="keyword" placeholder="Tìm sản phẩm"  onkeypress="doEnter(event,'keyword');" />
                        <p onclick="onSearch('keyword');"></p>
                </li>
            </ul>
        </div>
    </div>
</div>