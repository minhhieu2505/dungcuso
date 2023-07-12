<?php
    $countNotify = 0;

    /* Newsletter */
    if(isset($config['newsletter']))
    {
        $newsletterNotify = array();
        foreach($config['newsletter'] as $k => $v) 
        {
            $emailNotify = $d->rawQuery("select id from #_newsletter where type = ? and status = ''",array($k));
            $newsletterNotify[$k] = array();
            $newsletterNotify[$k]['title'] = $v['title_main'];
            $newsletterNotify[$k]['notify'] = count($emailNotify);
            $countNotify += $newsletterNotify[$k]['notify'];
        }
    }

    /* Order */
    if(isset($config['order']['active']) && $config['order']['active'] == true)
    {
        $orderNotify = $d->rawQuery("select id from #_order where order_status = 1");
        $countNotify += count($orderNotify);
    }
?>
<!-- Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item nav-item-hello d-sm-inline-block">
            <a class="nav-link"><span class="text-split"></span></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications -->
        <li class="nav-item d-sm-inline-block">
            <a href="../" target="_blank" class="nav-link"><i class="fas fa-reply"></i></a>
        </li>
        <li class="nav-item dropdown">
            
            <div class="dropdown-menu dropdown-menu-right shadow">
                <span class="dropdown-item dropdown-header p-0">Thông báo</span>
                <div class="dropdown-divider"></div>
                <a href="index.php?source=contact&act=man" class="dropdown-item"><i class="fas fa-envelope mr-2"></i><span class="badge badge-danger mr-1"><?=count($contactNotify)?></span> Liên hệ</a>
                <?php if(isset($config['order']['active']) && $config['order']['active'] == true) { ?>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?source=order&act=man" class="dropdown-item"><i class="fas fa-shopping-bag mr-2"></i><span class="badge badge-danger mr-1"><?=count($orderNotify)?></span> Đơn hàng</a>
                <?php } ?>
                <?php if(!empty($commentProductNotify)) { foreach($commentProductNotify as $k => $v) { ?>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?source=product&act=man&type=<?=$k?>&comment_status=new" class="dropdown-item"><i class="fas fa-comments mr-2"></i><span class="badge badge-danger mr-1"><?=$v['notify']?></span> Bình luận - <?=$v['title']?></a>
                <?php } } ?>
                <?php if(!empty($commentNewsNotify)) { foreach($commentNewsNotify as $k => $v) { ?>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?source=news&act=man&type=<?=$k?>&comment_status=new" class="dropdown-item"><i class="fas fa-comments mr-2"></i><span class="badge badge-danger mr-1"><?=$v['notify']?></span> Bình luận - <?=$v['title']?></a>
                <?php } } ?>
                <?php if(!empty($newsletterNotify)) { foreach($newsletterNotify as $k => $v) { ?>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?source=newsletter&act=man&type=<?=$k?>" class="dropdown-item"><i class="fas fa-mail-bulk mr-2"></i><span class="badge badge-danger mr-1"><?=$v['notify']?></span> <?=$v['title']?></a>
                <?php } } ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu-info" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Xin chào, <?=$_SESSION[$loginAdmin]['fullname']?>!</a>
            <ul aria-labelledby="dropdownSubMenu-info" class="dropdown-menu dropdown-menu-right border-0 shadow">
                <li>
                    <a href="index.php?source=user&act=info_admin" class="dropdown-item">
                        <i class="fas fa-user-cog"></i>
                        <span>Thông tin admin</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a href="index.php?source=user&act=info_admin&changepass=1" class="dropdown-item">
                        <i class="fas fa-key"></i>
                        <span>Đổi mật khẩu</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                <a href="index.php?source=user&act=logout" class="nav-link"><i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất</a>
                </li>
            </ul>
        </li>
       
    </ul>
</nav>