<?php
	if($act=="add") $labelAct = "Thêm mới";
	else if($act=="edit") $labelAct = "Chỉnh sửa";

	$linkMan = "index.php?source=product&act=man";
	if($act=='add') $linkFilter = "index.php?source=product&act=add";
	else if($act=='edit') $linkFilter = "index.php?source=product&act=edit"."&id=".$id;
    if($act=="copy") $linkSave = "index.php?source=product&act=save_copy";
    else $linkSave = "index.php?source=product&act=save";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active"><?=$labelAct?> sản phẩm</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <?=$flash->getMessages('admin')?>
        <div class="row">
            <div class="col-xl-8">
                <?php
                	$slugchange = ($act=='edit') ? 1 : 0;
                    include TEMPLATE.LAYOUT."slug.php";
			    ?>
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                    <li class="nav-item">
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
								<div class="tab-pane fade show active" id="tabs-lang-vi"
                                        role="tabpanel" aria-labelledby="tabs-lang">
                                        <div class="form-group">
                                            <label for="name">Tiêu đề:</label>
                                            <input type="text" class="form-control for-seo text-sm"
                                                name="data[name]" id="name"
                                                placeholder="Tiêu đề"
                                                value="<?=(!empty($flash->has('name'))) ? $flash->get('name') : @$item['name']?>"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Mô tả:</label>
                                            <textarea
                                                class="form-control for-seo text-sm form-control-ckeditor"
                                                name="data[description]" id="description" rows="5"
                                                placeholder="Mô tả"><?=htmlspecialchars_decode((!empty($flash->has('description'))) ? $flash->get('description') : @$item['description'])?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Nội dung:</label>
                                            <textarea
                                                class="form-control for-seo text-sm form-control-ckeditor"
                                                name="data[content]" id="content" rows="5"
                                                placeholder="Nội dung"><?=htmlspecialchars_decode((!empty($flash->has('content'))) ? $flash->get('content') : @$item['content'])?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="specifications">Thông số kỹ thuật</label>
                                            <textarea
                                                class="form-control for-seo text-sm form-control-ckeditor"
                                                name="data[specifications]" id="specifications" rows="5"
                                                placeholder="Nội dung"><?=htmlspecialchars_decode((!empty($flash->has('specifications'))) ? $flash->get('specifications') : @$item['specifications'])?></textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
            <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group-category row">
                        <div class="form-group col-xl-12 col-sm-6">
                                <label class="d-block" for="id_list">Danh mục cấp 1:</label>
                                <select name="data[id_category]" id="id_category" class="select2 w-100">
                                    <option value="">Chọn danh mục sản phẩm</option>
                                    <?php foreach($category as $v) { ?>
                                        <option value="<?=$v['id']?>" <?=($v['id'] == $item['id_category'] ? 'selected' : '')?> ><?=$v['name']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
	                    		/* Photo detail */
	                    		$photoDetail = array();
	                    		$photoDetail['upload'] = "upload/product";
	                    		$photoDetail['image'] = (!empty($item) && $act != 'copy') ? $item['photo'] : '';
	                    		$photoDetail['dimension'] = "Width: 270px - Height: 270px (.jpg|.gif|.png|.jpeg|.gif)";

	                    		/* Image */
	                    		include TEMPLATE.LAYOUT."image.php";
	                    	?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin sản phẩm</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <?php $config['product']['check'] = array( "hienthi" => "Hiển thị"); $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
                    <?php if(isset($config['product']['check'])) { foreach($config['product']['check'] as $key => $value) { ?>
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="<?=$key?>-checkbox"
                            class="d-inline-block align-middle mb-0 mr-2"><?=$value?>:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="checkbox" class="custom-control-input <?=$key?>-checkbox"
                                name="status[<?=$key?>]" id="<?=$key?>-checkbox"
                                <?=(empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : ''?>
                                value="<?=$key?>">
                            <label for="<?=$key?>-checkbox" class="custom-control-label"></label>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <div class="row">
                <div class="form-group col-md-4">
                        <label class="d-block" for="sku">Mã sản phẩm(Từ 6 đến 8 ký tự):</label>
                        <input type="text" class="form-control text-sm" pattern=".{4,}" maxlength="8" name="data[sku]" id="sku"
                            placeholder="Mã sản phẩm" required
                            value="<?=(!empty($flash->has('sku'))) ? $flash->get('sku') : @$item['sku']?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="regular_price">Giá bán:</label>
                        <div class="input-group">
                            <input type="text" class="form-control format-price regular_price text-sm"
                                name="data[regular_price]" id="regular_price" placeholder="Giá bán"
                                value="<?=(!empty($flash->has('regular_price'))) ? $flash->get('regular_price') : @$item['regular_price']?>">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="sale_price">Giá mới:</label>
                        <div class="input-group">
                            <input type="text" class="form-control format-price sale_price text-sm"
                                name="data[sale_price]" id="sale_price" placeholder="Giá mới"
                                value="<?=(!empty($flash->has('sale_price'))) ? $flash->get('sale_price') : @$item['sale_price']?>">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="discount">Chiết khấu:</label>
                        <div class="input-group">
                            <input type="text" class="form-control discount text-sm" name="data[discount]" id="discount"
                                placeholder="Chiết khấu"
                                value="<?=(!empty($flash->has('discount'))) ? $flash->get('discount') : @$item['discount']?>"
                                maxlength="3" readonly>
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>%</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="d-block" for="gallery">Album ảnh sản phẩm:</label>
                        <div class="review-file-uploader">
							<input type="file" id="review-file-photo" name="review-file-photo">
						</div>
                    </div>
                </div>
                <div class="row">
                    <?php 
                        foreach($gallery as $v){ ?>
                            <div class="form-group col-2 gallery-item-<?=$v['id']?> position-relative">
                                <div class="img-review-file-uploader">
                                    <img src="../upload/product/<?=$v['photo']?>" class="w-100" alt="" onerror="this.src='../assets/images/No-Image.png'">
                                </div>
                                <div class="delete-img"  data-id="<?=$v['id']?>">X</div>
                            </div>
                        <?php }
                    ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>