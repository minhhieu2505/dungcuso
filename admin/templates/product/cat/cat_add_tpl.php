<?php
    $linkMan = "index.php?com=product&act=man_cat&type=".$type;
    $linkSave = "index.php?com=product&act=save_cat&type=".$type;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết <?=$config['product'][$type]['title_main_cat']?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <?=$flash->getMessages('admin')?>
        
        <div class="row">
            <div class="col-xl-8">
                <?php
                if(isset($config['product'][$type]['slug_cat']) && $config['product'][$type]['slug_cat'] == true)
                {
                    $slugchange = ($act=='edit_cat') ? 1 : 0;
                    include TEMPLATE.LAYOUT."slug.php";
                }
                ?>
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung <?=$config['product'][$type]['title_main_cat']?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
                            <?php if(isset($config['product'][$type]['check_cat'])) { foreach($config['product'][$type]['check_cat'] as $key => $value) { ?>
                                <div class="form-group d-inline-block mb-2 mr-2">
                                    <label for="<?=$key?>-checkbox" class="d-inline-block align-middle mb-0 mr-2"><?=$value?>:</label>
                                    <div class="custom-control custom-checkbox d-inline-block align-middle">
                                        <input type="checkbox" class="custom-control-input <?=$key?>-checkbox" name="status[<?=$key?>]" id="<?=$key?>-checkbox" <?=(empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : ''?> value="<?=$key?>">
                                        <label for="<?=$key?>-checkbox" class="custom-control-label"></label>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="form-group">
                            <label for="numb" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                            <input type="number" class="form-control form-control-mini d-inline-block align-middle text-sm" min="0" name="data[numb]" id="numb" placeholder="Số thứ tự" value="<?=isset($item['numb']) ? $item['numb'] : 1?>">
                        </div>
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                    <?php foreach($config['website']['lang'] as $k => $v) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?=$k?>" role="tab" aria-controls="tabs-lang-<?=$k?>" aria-selected="true"><?=$v?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="card-body card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                    <?php foreach($config['website']['lang'] as $k => $v) { ?>
                                        <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                                            <div class="form-group">
                                                <label for="name<?=$k?>">Tiêu đề (<?=$k?>):</label>
                                                <input type="text" class="form-control for-seo text-sm" name="data[name<?=$k?>]" id="name<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=(!empty($flash->has('name'.$k))) ? $flash->get('name'.$k) : @$item['name'.$k]?>" required>
                                            </div>
                                            <?php if(isset($config['product'][$type]['desc_cat']) && $config['product'][$type]['desc_cat'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="desc<?=$k?>">Mô tả (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo text-sm <?=(isset($config['product'][$type]['desc_cke_cat']) && $config['product'][$type]['desc_cke_cat'] == true)?'form-control-ckeditor':''?>" name="data[desc<?=$k?>]" id="desc<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode((!empty($flash->has('desc'.$k))) ? $flash->get('desc'.$k) : @$item['desc'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($config['product'][$type]['content_cat']) && $config['product'][$type]['content_cat'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="content<?=$k?>">Nội dung (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo text-sm <?=(isset($config['product'][$type]['content_cke_cat']) && $config['product'][$type]['content_cke_cat'] == true)?'form-control-ckeditor':''?>" name="data[content<?=$k?>]" id="content<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode((!empty($flash->has('content'.$k))) ? $flash->get('content'.$k) : @$item['content'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục cấp 1</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group-category">
                            <?=$func->getAjaxCategory('product', 'list', $type)?>
                        </div>
                    </div>
                </div>
                <?php if(isset($config['product'][$type]['images_cat']) && $config['product'][$type]['images_cat'] == true) { ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh <?=$config['product'][$type]['title_main_cat']?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                /* Photo detail */
                                $photoDetail = array();
                                $photoDetail['upload'] = UPLOAD_PRODUCT_L;
                                $photoDetail['image'] = (!empty($item)) ? $item['photo'] : '';
                                $photoDetail['dimension'] = "Width: ".$config['product'][$type]['width_cat']." px - Height: ".$config['product'][$type]['height_cat']." px (".$config['product'][$type]['img_type_cat'].")";

                                /* Image */
                                include TEMPLATE.LAYOUT."image.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php if(isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true) { ?>
            <div class="card card-primary card-outline text-sm">
                <div class="card-header">
                    <h3 class="card-title">Nội dung SEO</h3>
                    <a class="btn btn-sm bg-gradient-success d-inline-block text-white float-right create-seo" title="Tạo SEO">Tạo SEO</a>
                </div>
                <div class="card-body">
                    <?php
                        $seoDB = $seo->getOnDB($id,$com,'man_cat',$type);
                        include TEMPLATE.LAYOUT."seo.php";
                    ?>
                </div>
            </div>
        <?php } ?>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>