<div class="card card-primary card-outline text-sm d-none ">
    <div class="card-header">
        <h3 class="card-title">Đường dẫn</h3>
        <span class="pl-2 text-danger">(Vui lòng không nhập trùng tiêu đề)</span>
    </div>
    <div class="card-body card-slug">
        <?php if(isset($slugchange) && $slugchange == 1) { ?>
        <div class="form-group mb-2">
            <label for="slugchange" class="d-inline-block align-middle text-info mb-0 mr-2">Thay đổi đường dẫn theo tiêu
                đề mới:</label>
            <div class="custom-control custom-checkbox d-inline-block align-middle">
                <input type="checkbox" class="custom-control-input" name="slugchange" id="slugchange" value="<?=(!empty($flash->has('slug'))) ? $flash->get('slug') : @$item['slug']?>">
                <label for="slugchange" class="custom-control-label"></label>
            </div>
        </div>
        <?php } ?>

        <input type="hidden" class="slug-id" value="<?=isset($id) ? $id : ''?>">

        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                <div class="tab-pane fade show active" id="tabs-sluglang-vi
                        role="tabpanel" aria-labelledby="tabs-lang">
                        <div class="form-gourp mb-0">
                            <label class="d-block">Đường dẫn mẫu:<span class="pl-2 font-weight-normal"
                                    id="slugurlpreviewvi"><?=$configBase?><strong
                                        class="text-info"><?=@$item['slug']?></strong></span></label>
                            <input type="text" class="form-control slug-input no-validate text-sm" name="slug"
                                id="slug" placeholder="Đường dẫn" value="<?=(!empty($flash->has('slug'))) ? $flash->get('slug') : @$item['slug']?>"
                                required>
                            <input type="hidden" id="slug-defaultvi" value="<?=(!empty($flash->has('slug'))) ? $flash->get('slug') : @$item['slug']?>">
                            <p class="alert-slug text-danger d-none mt-2 mb-0" id="alert-slug-dangervi">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                <span>Đường dẫn đã tồn tại. Đường dẫn truy cập mục này có thể bị trùng lặp.</span>
                            </p>
                            <p class="alert-slug text-success d-none mt-2 mb-0" id="alert-slug-successvi">
                                <i class="fas fa-check-circle mr-1"></i>
                                <span>Đường dẫn hợp lệ.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>