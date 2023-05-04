<!-- Main Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 text-sm">
    <!-- Logo -->
    <a class="brand-link" href="index.php">
        <img class="brand-image" src="assets/images/logo.png" alt="Logo">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview"
                role="menu" data-accordion="false">
                <!-- Bảng điều khiển -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php" title="Bảng điều khiển">
                        <i class="nav-icon text-sm fas fa-tachometer-alt"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>

                <!-- Sản phẩm -->
                <?php if (isset($config['product'])) { ?>
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="#" title="Quản lý sản phẩm">
                            <i class="nav-icon text-sm fas fa-boxes"></i>
                            <p>
                                Quản lý sản phẩm
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a class="nav-link " href="index.php?source=product&act=category"
                                    title="Danh mục sản phẩm"><i class="nav-icon text-sm far fa-caret-square-right"></i>
                                    <p>Danh mục sản phẩm</p>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?source=product&act=man"
                                    title="Sản phẩm"><i class="nav-icon text-sm far fa-caret-square-right"></i>
                                    <p>Sản phẩm</p>
                                </a></li>
                        </ul>
                    </li>
                <?php } ?>

                <!-- Bài viết (Theo Type) -->
                <li class="nav-item has-treeview ">
                    <a class="nav-link" href="#" title="Quản lý bài viết">
                        <i class="nav-icon text-sm far fa-newspaper"></i>
                        <p>
                            Quản lý bài viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php foreach ($config['news'] as $k => $v) {
                            if (!isset($disabled['news'][$k]) && empty($v['dropdown'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?source=news&act=man&type=<?= $k ?>"
                                        title="<?= $v['title_main'] ?>"><i
                                            class="nav-icon text-sm far fa-caret-square-right"></i>
                                        <p>
                                            <?= $v['title_main'] ?>
                                        </p>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </li>
                <!-- Multi -->
                <li class="nav-item has-treeview">
                    <a class="nav-link" href="#" title="Quản lý hình ảnh - video">
                        <i class="nav-icon text-sm fas fa-photo-video"></i>
                        <p>
                            Quản lý hình ảnh - Media
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (isset($config['photo']['photo_static'])) { ?>
                            <?php foreach ($config['photo']['photo_static'] as $k => $v) {
                                if ($com == 'photo' && $_GET['type'] == $k && $act == 'photo_static')
                                    $active = "active"; ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?source=photo&act=photo_static&type=<?= $k ?>"
                                        title="<?= $v['title_main'] ?>"><i
                                            class="nav-icon text-sm far fa-caret-square-right"></i>
                                        <p>
                                            <?= $v['title_main'] ?>
                                        </p>
                                    </a>
                                </li>
                            <?php }

                            ?>
                        <?php } ?>
                        <?php if (isset($config['photo']['man_photo'])) { ?>
                            <?php foreach ($config['photo']['man_photo'] as $k => $v) {
                                if (!isset($disabled['photo'][$k])) {
                                    $none = "";
                                    $active = "";
                                    if (isset($is_permission) && $is_permission == true) if ($func->checkPermission('photo', 'man_photo', $k, null, 'phrase-1'))
                                        $none = "d-none";
                                    if ($com == 'photo' && $_GET['type'] == $k && ($act == 'man_photo' || $act == 'add_photo' || $act == 'edit_photo'))
                                        $active = "active"; ?>
                                    <li class="nav-item <?= $none ?>">
                                        <a class="nav-link <?= $active ?>"
                                            href="index.php?source=photo&act=man_photo&type=<?= $k ?>"
                                            title="<?= $v['title_main_photo'] ?>"><i
                                                class="nav-icon text-sm far fa-caret-square-right"></i>
                                            <p>
                                                <?= $v['title_main_photo'] ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php }
                            } ?>
                        <?php } ?>
                    </ul>
                </li>
                <!-- Thiết lập thông tin -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?source=setting&act=update" title="Thiết lập thông tin">
                        <i class="nav-icon text-sm fas fa-cogs"></i>
                        <p>Thiết lập thông tin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?source=order&act=man" title="Quản lý đơn hàng">
                        <i class="nav-icon text-sm fas fa-shopping-bag"></i>
                        <p>Quản lý đơn hàng</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>