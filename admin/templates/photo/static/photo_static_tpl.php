<?php
    $linkSave = "index.php?com=photo&act=save_static&type=".$type;
    $options = (isset($item['options']) && $item['options'] != '') ? json_decode($item['options'],true) : null;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý hình ảnh - video</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" id="form-watermark" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>

        <?=$flash->getMessages('admin')?>

        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Chi tiết <?=$config['photo']['photo_static'][$type]['title_main']?></h3>
            </div>
            <div class="card-body">
                <?php if(isset($config['photo']['photo_static'][$type]['images']) && $config['photo']['photo_static'][$type]['images'] == true) { ?>
                    <div class="form-group">
                        <div class="upload-file">
                            <p>Upload hình ảnh:</p>
                            <label class="upload-file-label mb-2" for="file">
                                <div class="upload-file-image rounded mb-3">
                                    <?=$func->getImage(['class' => 'rounded img-upload', 'sizes' => $config['photo']['photo_static'][$type]['thumb'], 'upload' => UPLOAD_PHOTO_L, 'image' => (!empty($item['photo'])) ? $item['photo'] : '', 'alt' => 'Alt Photo'])?>
                                </div>
                                <div class="custom-file my-custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="file" lang="vi">
                                    <label class="custom-file-label mb-0" data-browse="Chọn" for="file">Chọn file</label>
                                </div>
                            </label>
                            <strong class="d-block text-sm"><?php echo "Width: ".$config['photo']['photo_static'][$type]['width']." px - Height: ".$config['photo']['photo_static'][$type]['height']." px (".$config['photo']['photo_static'][$type]['img_type'].")" ?></strong>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($config['photo']['photo_static'][$type]['watermark-advanced']) && $config['photo']['photo_static'][$type]['watermark-advanced'] == true) { ?>
                    <?php
                        $tl = (isset($options) && $options != null && $options['watermark']['position'] == 1 || !isset($options['watermark']['position'])) ? 'checked' : '';
                        $tc = (isset($options) && $options != null && $options['watermark']['position'] == 2) ? 'checked' : '';
                        $tr = (isset($options) && $options != null && $options['watermark']['position'] == 3) ? 'checked' : '';
                        $mr = (isset($options) && $options != null && $options['watermark']['position'] == 4) ? 'checked' : '';
                        $br = (isset($options) && $options != null && $options['watermark']['position'] == 5) ? 'checked' : '';
                        $bc = (isset($options) && $options != null && $options['watermark']['position'] == 6) ? 'checked' : '';
                        $bl = (isset($options) && $options != null && $options['watermark']['position'] == 7) ? 'checked' : '';
                        $ml = (isset($options) && $options != null && $options['watermark']['position'] == 8) ? 'checked' : '';
                        $cc = (isset($options) && $options != null && $options['watermark']['position'] == 9) ? 'checked' : '';
                        $watermark = $watermarkError = array();
                        $watermark['class'] = $watermarkError['class'] = 'rounded';
                        $watermark['sizes'] = $config['photo']['photo_static'][$type]['thumb'];
                        $watermark['upload'] = UPLOAD_PHOTO_L;
                        $watermark['image'] = @$item['photo'];
                        $watermark['alt'] = $watermarkError['alt'] = 'watermark-cover';
                        $watermarkError['size-error'] = '50x50x1';
                        $watermarkError['upload'] = $watermarkError['image'] = '';
                    ?>
                    <div class="row">
                        <div class="col-xl-4 row">
                            <div class="form-group col-12">
                                <label>Vị trí đóng dấu:</label>
                                <div class="watermark-position rounded">
                                    <label for="tl">
                                        <input type="radio" name="data[options][watermark][position]" id="tl" value="1" <?=$tl?>>
                                        <?=(!empty($tl)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="tc">
                                        <input type="radio" name="data[options][watermark][position]" id="tc" value="2" <?=$tc?>>
                                        <?=(!empty($tc)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="tr">
                                        <input type="radio" name="data[options][watermark][position]" id="tr" value="3" <?=$tr?>>
                                        <?=(!empty($tr)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="mr">
                                        <input type="radio" name="data[options][watermark][position]" id="mr" value="4" <?=$mr?>>
                                        <?=(!empty($mr)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="br">
                                        <input type="radio" name="data[options][watermark][position]" id="br" value="5" <?=$br?>>
                                        <?=(!empty($br)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="bc">
                                        <input type="radio" name="data[options][watermark][position]" id="bc" value="6" <?=$bc?>>
                                        <?=(!empty($bc)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="bl">
                                        <input type="radio" name="data[options][watermark][position]" id="bl" value="7" <?=$bl?>>
                                        <?=(!empty($bl)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="ml">
                                        <input type="radio" name="data[options][watermark][position]" id="ml" value="8" <?=$ml?>>
                                        <?=(!empty($ml)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                    <label for="cc">
                                        <input type="radio" name="data[options][watermark][position]" id="cc" value="9" <?=$cc?>>
                                        <?=(!empty($cc)) ? $func->getImage($watermark) : $func->getImage($watermarkError)?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 row">
                            <?php /* ?>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Độ trong suốt:</label>
                                <input type="text" class="form-control text-sm" name="data[options][watermark][opacity]" placeholder="70" value="<?=(!empty($options['watermark']['opacity'])) ? $options['watermark']['opacity'] : ''?>">
                            </div>
                            <?php */ ?>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Tỉ lệ:</label>
                                <input type="text" class="form-control text-sm" name="data[options][watermark][per]"  placeholder="2" value="<?=(!empty($flash->has('per'))) ? $flash->get('per') : @$options['watermark']['per']?>">
                            </div>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Tỉ lệ < 300px:</label>
                                <input type="text" class="form-control text-sm" name="data[options][watermark][small_per]" placeholder="3" value="<?=(!empty($flash->has('small_per'))) ? $flash->get('small_per') : @$options['watermark']['small_per']?>">
                            </div>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Kích thước tối đa:</label>
                                <input type="text" class="form-control text-sm" name="data[options][watermark][max]" placeholder="600" value="<?=(!empty($flash->has('max'))) ? $flash->get('max') : @$options['watermark']['max']?>">
                            </div>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Kích thước tối thiểu:</label>
                                <input type="text" class="form-control text-sm" name="data[options][watermark][min]" placeholder="100" value="<?=(!empty($flash->has('min'))) ? $flash->get('min') : @$options['watermark']['min']?>">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm bg-gradient-success mb-3" href="javascript:previewWatermark();"><i class="fas fa-photo-video mr-2"></i>Preivew</a>
                <?php } ?>
                <div class="row">
                    <?php if(isset($config['photo']['photo_static'][$type]['background']) && $config['photo']['photo_static'][$type]['background'] == true) { ?>
                        <div class="form-group col-md-3">
                            <label for="background_repeat">Tùy chọn lặp:</label>
                            <select id="background_repeat" name="data[options][background][repeat]" class="form-control select2">
                                <option value="0">Chọn thuộc tính</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='no-repeat') echo 'selected="selected"' ?> value="no-repeat">Không lặp lại</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='repeat') echo 'selected="selected"' ?> value="repeat">Lặp lại</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='repeat-x') echo 'selected="selected"' ?> value="repeat-x">Lặp lại theo chiều ngang</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='repeat-y') echo 'selected="selected"' ?> value="repeat-y">Lặp lại theo chiều dọc</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_size">Kích thước:</label>
                            <select id="background_size" name="data[options][background][size]" class="form-control select2">
                                <option value="0">Chọn thuộc tính</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='auto') echo 'selected="selected"' ?> value="auto">Auto</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='cover') echo 'selected="selected"' ?> value="cover">Cover</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='contain') echo 'selected="selected"' ?> value="contain">Contain</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='100% 100%') echo 'selected="selected"' ?> value="100% 100%">Toàn màn hình</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='100% auto') echo 'selected="selected"' ?> value="100% auto">Toàn màn hình theo chiều ngang</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='auto 100%') echo 'selected="selected"' ?> value="auto 100%">Toàn màn hình theo chiều dọc</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_position">Vị trí:</label>
                            <select id="background_position" name="data[options][background][position]" class="form-control select2">
                                <option value="0">Chọn thuộc tính</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='left top') echo 'selected="selected"' ?> value="left top">Canh Trái - Canh Trên</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='left bottom') echo 'selected="selected"' ?> value="left bottom">Canh Trái - Canh Dưới</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='left center') echo 'selected="selected"' ?> value="left center">Canh Trái - Canh Giữa</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='right top') echo 'selected="selected"' ?> value="right top">Canh Phải - Canh Trên</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='right bottom') echo 'selected="selected"' ?> value="right bottom">Canh Phải - Canh Dưới</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='right center') echo 'selected="selected"' ?> value="right center">Canh Phải - Canh Giữa</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='center top') echo 'selected="selected"' ?> value="center top">Canh Giữa - Canh Trên</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='center bottom') echo 'selected="selected"' ?> value="center bottom">Canh Giữa - Canh Dưới</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='center center') echo 'selected="selected"' ?> value="center center">Canh Giữa - Canh Giữa</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_attachment">Cố định:</label>
                            <select class="custom-select text-sm" name="data[options][background][attachment]" id="background_attachment">
                                <option <?=(isset($options['background']['attachment']) && $options['background']['attachment']=='')?"selected":""?> value="0">Không cố định</option>
                                <option <?=(isset($options['background']['attachment']) && $options['background']['attachment']=='fixed')?"selected":""?> value="fixed">Cố định</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_color">Màu nền:</label>
                            <input type="text" class="form-control jscolor text-sm" name="data[options][background][color]" id="background_color" maxlength="7" value="<?=(isset($options['background']['color']) && $options['background']['color'] != '')?$options['background']['color']:'#000000'?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="type_show">Loại hiển thị:</label>
                            <select class="custom-select text-sm" name="data[options][background][type_show]" id="type_show">
                                <option value="0">Chọn tình trạng</option>
                                <option <?=(isset($options['background']['type_show']) && $options['background']['type_show']==1)?"selected":""?> value="1">Hình nền</option>
                                <option <?=(isset($options['background']['type_show']) && $options['background']['type_show']==0)?"selected":""?> value="0">Màu nền</option>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($config['photo']['photo_static'][$type]['link']) && $config['photo']['photo_static'][$type]['link'] == true) { ?>
                        <div class="form-group col-md-6">
                            <label for="link">Link:</label>
                            <input type="text" class="form-control text-sm" name="data[link]" id="link" placeholder="Link" value="<?=(!empty($flash->has('link'))) ? $flash->get('link') : @$item['link']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['photo']['photo_static'][$type]['video']) && $config['photo']['photo_static'][$type]['video'] == true) { ?>
                        <div class="form-group col-md-6">
                            <label for="link_video">Video:</label>
                            <input type="text" class="form-control text-sm" name="data[link_video]" id="link_video" placeholder="Video" value="<?=(!empty($flash->has('link_video'))) ? $flash->get('link_video') : @$item['link_video']?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <?php $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
                    <?php if(isset($config['photo']['photo_static'][$type]['check'])) { foreach($config['photo']['photo_static'][$type]['check'] as $key => $value) { ?>
                        <div class="form-group d-inline-block mb-2 mr-2">
                            <label for="<?=$key?>-checkbox" class="d-inline-block align-middle mb-0 mr-2"><?=$value?>:</label>
                            <div class="custom-control custom-checkbox d-inline-block align-middle">
                                <input type="checkbox" class="custom-control-input <?=$key?>-checkbox" name="status[<?=$key?>]" id="<?=$key?>-checkbox" <?=(empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : ''?> value="<?=$key?>">
                                <label for="<?=$key?>-checkbox" class="custom-control-label"></label>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
                <?php if(
                    (isset($config['photo']['photo_static'][$type]['name']) && $config['photo']['photo_static'][$type]['name'] == true) || 
                    (isset($config['photo']['photo_static'][$type]['desc']) && $config['photo']['photo_static'][$type]['desc'] == true) || 
                    (isset($config['photo']['photo_static'][$type]['content']) && $config['photo']['photo_static'][$type]['content'] == true)
                ) { ?>
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
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                <?php foreach($config['website']['lang'] as $k => $v) { ?>
                                    <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                                        <?php if((isset($config['photo']['photo_static'][$type]['name']) && $config['photo']['photo_static'][$type]['name'] == true)) { ?>
                                            <div class="form-group">
                                                <label for="name<?=$k?>">Tiêu đề (<?=$k?>):</label>
                                                <input type="text" class="form-control text-sm" name="data[name<?=$k?>]" id="name<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=(!empty($flash->has('name'.$k))) ? $flash->get('name'.$k) : @$item['name'.$k]?>">
                                            </div>
                                        <?php } ?>
                                        <?php if((isset($config['photo']['photo_static'][$type]['desc']) && $config['photo']['photo_static'][$type]['desc'] == true)) { ?>
                                            <div class="form-group">
                                                <label for="desc<?=$k?>">Mô tả (<?=$k?>):</label>
                                                <textarea class="form-control text-sm <?=((isset($config['photo']['photo_static'][$type]['desc_cke']) && $config['photo']['photo_static'][$type]['desc_cke'] == true))?'form-control-ckeditor':''?>" name="data[desc<?=$k?>]" id="desc<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode((!empty($flash->has('desc'.$k))) ? $flash->get('desc'.$k) : @$item['desc'.$k])?></textarea>
                                            </div>
                                        <?php } ?>
                                        <?php if((isset($config['photo']['photo_static'][$type]['content']) && $config['photo']['photo_static'][$type]['content'] == true)) { ?>
                                            <div class="form-group">
                                                <label for="content<?=$k?>">Nội dung (<?=$k?>):</label>
                                                <textarea class="form-control text-sm <?=((isset($config['photo']['photo_static'][$type]['content_cke']) && $config['photo']['photo_static'][$type]['content_cke'] == true))?'form-control-ckeditor':''?>" name="data[content<?=$k?>]" id="content<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode((!empty($flash->has('content'.$k))) ? $flash->get('content'.$k) : @$item['content'.$k])?></textarea>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
    </form>
</section>