<?php
	$linkMan = "index.php?source=user&act=man_member";
    $linkAdd = "index.php?source=user&act=add_member";
	$linkEdit = "index.php?source=user&act=edit_member";
	$linkDelete = "index.php?source=user&act=delete_member";
?>

<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý tài khoản khách</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
        
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
            <h3 class="card-title">Danh sách tài khoản khách</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center" width="10%">STT</th>
                        <th class="align-middle">Tài khoản</th>
                        <th class="align-middle">Họ tên</th>
                        <th class="align-middle">Email</th>
                        <?php if(isset($config['user']['check_member'])) { foreach($config['user']['check_member'] as $key => $value) { ?>
                            <th class="align-middle text-center"><?=$value?></th>
                        <?php } } ?>
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
                                    <input type="number" class="form-control form-control-mini m-auto update-numb" min="0" value="<?=$i+1?>" data-id="<?=$items[$i]['id']?>" data-table="member">
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['username']?>"><?=$items[$i]['username']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['fullname']?>"><?=$items[$i]['fullname']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['email']?>"><?=$items[$i]['email']?></a>
                                </td>
                                <?php $status_array = (!empty($items[$i]['status'])) ? explode(',', $items[$i]['status']) : array(); ?>
                                <?php if(isset($config['user']['check_member'])) { foreach($config['user']['check_member'] as $key => $value) { ?>
                                    <td class="align-middle text-center">
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" data-table="member" data-id="<?=$items[$i]['id']?>" data-attr="<?=$key?>" <?=(in_array($key, $status_array)) ? 'checked' : ''?>>
                                            <label for="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                                        </div>
                                    </td>
                                <?php } } ?>
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
        
    </div>
</section>