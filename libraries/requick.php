<?php
/* Request data */
$com = (!empty($_REQUEST['com'])) ? htmlspecialchars($_REQUEST['com']) : '';
$act = (!empty($_REQUEST['act'])) ? htmlspecialchars($_REQUEST['act']) : '';
$type = (!empty($_REQUEST['type'])) ? htmlspecialchars($_REQUEST['type']) : '';
$kind = (!empty($_REQUEST['kind'])) ? htmlspecialchars($_REQUEST['kind']) : '';
$val = (!empty($_REQUEST['val'])) ? htmlspecialchars($_REQUEST['val']) : '';
$variant = (!empty($_GET['variant'])) ? htmlspecialchars($_GET['variant']) : '';
$id_parent = (!empty($_REQUEST['id_parent'])) ? htmlspecialchars($_REQUEST['id_parent']) : '';
$id = (!empty($_REQUEST['id'])) ? htmlspecialchars($_REQUEST['id']) : '';
$curPage = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
if (!empty($kind)) $dfgallery = ($kind == 'man_list') ? 'gallery_list' : 'gallery';
else $dfgallery = '';

/* Kiểm tra đăng nhập */
if ($func->checkLoginAdmin() == false && $act != "login") {
    $func->redirect("index.php?com=user&act=login");
}


/* Delete cache */
$cacheAction = array(
    'save',
    'save_copy',
    'save_list',
    'save_cat',
    'save_item',
    'save_photo',
    'save_ward',
    'update',
    'delete',
    'delete_list',
    'delete_cat'
);
if (isset($_POST) && isset($cacheAction) && count($cacheAction) > 0) {
    if (in_array($act, $cacheAction)) {
        $cache->delete();
    }
}

/* Include sources */
if (file_exists(SOURCES . $com . '.php')) { include SOURCES . $com . ".php"; }
else $template = "index";
