<?php 
	$linkMan = "index.php?source=product&act=category";
	$linkAdd = "index.php?source=product&act=add_cate";
    $linkEdit = "index.php?source=product&act=edit_cate";
    $linkDelete = "index.php?source=product&act=delete_cate";
    $linkMulti = "index.php?source=product&act=man_photo&kind=man_list";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Danh mục sản phẩm</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
    	<a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="<?=(isset($_GET['keyword'])) ? $_GET['keyword'] : ''?>" onkeypress="doEnter(event,'keyword','<?=$linkMan?>')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','<?=$linkMan?>')">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách danh mục</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center" width="10%">STT</th>
						<th class="align-middle">Hình</th>
						<th class="align-middle" style="width:30%">Tiêu đề</th>
						<th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) { ?>
                            <tr>
                                <td class="align-middle">
                                    <input type="number" class="form-control form-control-mini m-auto update-numb" min="0" value="<?=$i+1?>" data-id="<?=$items[$i]['id']?>" data-table="product_list">
                                </td>
                                <td class="align-middle">
                                    	<a href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['name']?>">
                                            <img src="../upload/product/<?=$items[$i]['photo']?>" alt="" width="60" height="60">
                                        </a>
                                    </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['name']?>"><?=$items[$i]['name']?></a>
                                </td>
                                <td class="align-middle text-center">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" data-table="category" data-id="<?=$items[$i]['id']?>" data-attr="hienthi" <?=($items[$i]['status'] == 'hienthi') ? 'checked' : ''?>>
                                            <label for="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                <td class="align-middle text-center text-md text-nowrap">
                                    <a class="mr-2 btn btn-success me-2" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" id="delete-item" data-url="<?=$linkDelete?>&id=<?=$items[$i]['id']?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($paging) { ?>
        <div class="card-footer text-sm pb-0">
            <?=$paging?>
        </div>
    <?php } ?>
    <div class="card-footer text-sm">
    	<a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
    </div>
</section>